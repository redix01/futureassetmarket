<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\FundingMail;
use App\Models\BuyStock;
use App\Models\SellStock;
use App\Models\Stock;
use App\Models\User;
use App\Models\Trade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        return view('admin.stock.index', compact('stocks'));
    }

    public function deleteStock($id)
    {
        $data = Stock::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Stock has been deleted');
    }

    public function tradeHistory()
    {
        // Fetch user-placed trades from the unified trades table
        $tradeOrders = Trade::with('user')->latest()->get();

        // Existing stock-specific buy/sell history
        $data = BuyStock::with(['user', 'stock'])->latest()->get();
        $sellHistory = SellStock::latest()->get();

        return view('admin.stock.tradeHistory', compact('data', 'sellHistory', 'tradeOrders'));
    }


    public function addStockProfit(Request $request, $id)
    {
        $data = BuyStock::findOrFail($id);
        $data->amount = $request->amount;
        $data->save();
        $user = User::find($data->user_id);
        $user->profit += $request->amount;
        $user->balance += $request->amount;
        $user->save();
        Mail::to($user)->send(new FundingMail($user, $request->amount));
        return redirect()->back()->with('success', 'Profit Added Successfully');
    }

    public function deleteTrade($id)
    {
        $data = SellStock::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Stock has been deleted');
    }

    /**
     * Update trade PNL (Profit or Loss)
     */
    public function updateTradePnl(Request $request, $id)
    {
        $request->validate([
            'pnl' => 'required|numeric',
        ]);

        $trade = BuyStock::findOrFail($id);
        $trade->pnl = $request->pnl;
        $trade->save();

        return redirect()->back()->with('success', 'Trade PNL updated successfully!');
    }

    /**
     * Close a trade (change status from Live to Cancelled)
     */
    public function closeTrade($id)
    {
        $trade = BuyStock::findOrFail($id);
        
        // Only allow closing if trade is currently Live (status = 2)
        if ($trade->status == 2) {
            $trade->status = 0; // Set to Cancelled
            $trade->save();
            return redirect()->back()->with('success', 'Trade closed successfully!');
        }

        return redirect()->back()->with('error', 'Only live trades can be closed.');
    }
}
