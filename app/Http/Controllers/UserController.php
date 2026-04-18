<?php

namespace App\Http\Controllers;

use App\Models\BuyStock;
use App\Models\CryptoExchange;
use App\Models\Deposit;
use App\Models\Session;
use App\Models\Stock;
use App\Models\StockHolding;
use App\Models\User;
use App\Models\Withdrawal;
use App\Services\StockService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $stockService;

    public function __construct(StockService $stockService)
    {
        $this->stockService = $stockService;
    }

    public function index()
    {
        $user = Auth::user();
        $withdrawal = Withdrawal::whereUserId(auth()->id())->where('status', 1)->sum('amount');
        $deposit = Deposit::whereUserId(auth()->id())->where('status', 1)->sum('amount');

        $stocks = StockHolding::where('user_id', Auth::id())
            ->with('stock')
            ->latest()
            ->get();

        // Fetch latest stock prices using injected StockService
        $symbols = $stocks->pluck('stock.symbol')->unique()->toArray();
        $latestStockData = $this->stockService->fetchStockData($symbols);
        $stockPrices = collect($latestStockData)->pluck('price', 'symbol');

        // Calculate PnL and current value for each holding
        $stocks->each(function ($holding) use ($stockPrices) {
            $latestPrice = $stockPrices[$holding->stock->symbol] ?? null;

            if ($latestPrice) {
                // Current value = total shares * latest price
                $holding->current_value = $holding->total_shares * $latestPrice;

                // PnL percentage = ((latest price - average price) / average price) * 100
                $holding->pnl = $holding->average_price
                    ? (($latestPrice - $holding->average_price) / $holding->average_price) * 100
                    : 0;
            } else {
                $holding->current_value = null;
                $holding->pnl = null;
            }
        });

        $totalInvested = $stocks->sum('total_amount');
        // Total current value (sum of current values based on latest prices)
        $totalCurrentValue = $stocks->sum('current_value') ?? $totalInvested;

        $crypto = CryptoExchange::where('user_id', auth()->id())->sum('amount');
        
        // Generate Chart Data
        $chartData = $this->generateChartData($user);

        return view('dashboard.index', compact('user', 'withdrawal', 'deposit',
            'totalCurrentValue', 'totalInvested', 'crypto', 'stocks', 'chartData'));
    }

    private function generateChartData($user)
    {
        // 1. Collect all transactions with their dates and effective amounts on the balance
        // Deposits: +amount
        $deposits = Deposit::where('user_id', $user->id)->where('status', 1)->get()->map(function($item) {
            return ['date' => $item->created_at, 'amount' => $item->amount];
        });
        
        // Withdrawals: -amount
        $withdrawals = Withdrawal::where('user_id', $user->id)->where('status', 1)->get()->map(function($item) {
            return ['date' => $item->created_at, 'amount' => -$item->amount];
        });
        
        // Stock Buys (deduct from balance): -amount
        $stockBuys = \App\Models\StockOrder::where('user_id', $user->id)->where('status', 2)->get()->map(function($item) {
            return ['date' => $item->created_at, 'amount' => -$item->amount];
        });
        
        // Sell Stock (add to balance): +amount (assuming amount is the returned value)
        $stockSells = \App\Models\SellStock::where('user_id', $user->id)->where('status', 1)->get()->map(function($item) {
            return ['date' => $item->created_at, 'amount' => $item->amount];
        });
        
        // Crypto Exchange (Assuming deposits to crypto reduce balance)
        // If CryptoExchange 'deposit' means User deposits into Crypto Wallet -> Balance decreases?
        // Let's assume standard flow: user creates exchange order to buy crypto -> balance decreases.
        // Need to check CryptoExchange model usage. Assuming similar to StockBuy for now if amount is deducted.
        // Ignoring complicated crypto flows for simplicity to avoid breaking if logic is different.

        $transactions = $deposits->concat($withdrawals)->concat($stockBuys)->concat($stockSells)
            ->sortByDesc('date');

        // 2. Prepare date ranges
        $ranges = [
            '7D' => 7,
            '30D' => 30,
            '90D' => 90
        ];
        
        $result = [];
        $currentBalance = $user->balance;
        
        foreach ($ranges as $key => $days) {
            $labels = [];
            $data = [];
            
            $endDate = now();
            $startDate = now()->subDays($days);
            
            // Working backwards from today
            $tempBalance = $currentBalance;
            $periodTransactions = $transactions->filter(function($t) use ($startDate) {
                return $t['date'] >= $startDate;
            });

            // We need daily data points.
            for ($d = 0; $d <= $days; $d++) {
                $date = $endDate->copy()->subDays($d);
                $dateString = $date->format('M j');
                
                // Transactions on this day
                // Note: since we iterate backwards, we start with today's balance.
                // The balance at the END of this day is $tempBalance.
                
                // Save point
                if ($d < $days) { // Don't add the last one which is start date - 1 technically if we want strict range
                   array_unshift($data, $tempBalance);
                   array_unshift($labels, $dateString);
                }

                // Reverse calculate balance for the start of this day (which is end of previous day)
                $dayTransactions = $periodTransactions->filter(function($item) use ($date) {
                    return $item['date']->isSameDay($date);
                });
                
                // Balance at start of day = Balance at end - sum(transactions)
                $dayChange = $dayTransactions->sum('amount');
                $tempBalance -= $dayChange;
            }
            
            $result[$key] = [
                'labels' => $labels,
                'data' => $data
            ];
        }
        
        return $result;
    }

    public function profile()
    {
        $user = Auth::user();
        $sessions = Session::whereUserId(auth()->id())->get();
        return view('dashboard.profile', compact('user', 'sessions'));
    }

    public function updateProfile(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'phone' => 'nullable|string',
            'telegram' => 'nullable|string',
            'city' => 'nullable|string',
            'address' => 'nullable|string',
            'country' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = User::findOrFail($id);
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $avatarPath = $request->file('avatar')->store('files', 'public');
            $validated['avatar'] = $avatarPath;
        }
        $user->update($validated);
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('status', 'Password updated successfully!');
    }

    public function loading()
    {
        return view('dashboard.loading');
    }


    public function kycStart()
    {
        $user = Auth::user();
        return view('dashboard.user.kyc_1', compact('user'));
    }
    public function kycform()
    {
        $user = Auth::user();
        if ((int) $user->status !== 0) {
            return redirect()->route('user.kycStart');
        }

        return view('dashboard.user.kyc', compact('user'));
    }
    public function submitKyc(Request $request)
    {
        $user = Auth::user();
        if ((int) $user->status !== 0) {
            return redirect()->route('user.kycStart')->with('success', 'Your KYC is already under review or verified.');
        }

        $request->validate([
            'phone' => 'nullable|string|max:20',
            'telegram' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'id_type' => 'required|string',
            'id_image_1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'id_image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->fill($request->only([
            'phone', 'telegram',
            'country', 'city', 'address', 'id_type'
        ]));

        if ($request->hasFile('id_image_1')) {
            $user->id_image_1 = $request->file('id_image_1')->store('files', 'public');
        }

        if ($request->hasFile('id_image_2')) {
            $user->id_image_2 = $request->file('id_image_2')->store('files', 'public');
        }


        $user->save();

        return redirect()->back()->with('success', 'KYC details submitted successfully.');
    }


}
