<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trade;
use App\Models\User;
use Illuminate\Http\Request;

class TradeRoomController extends Controller
{
    /**
     * Update Trade Room trade profit
     */
    public function updateTradeRoomProfit(Request $request, $id)
    {
        $request->validate([
            'profit' => 'required|numeric',
        ]);

        $trade = Trade::findOrFail($id);
        
        // Calculate difference to sync with user balance
        $oldProfit = $trade->profit ?? 0;
        $newProfit = $request->profit;
        $difference = $newProfit - $oldProfit;

        // Update trade profit
        $trade->profit = $newProfit;
        $trade->save();

        // Sync with User Balance & Profit if Live account
        if ($trade->acct_type == 'Live') {
            $user = User::find($trade->user_id);
            if ($user) {
                $user->balance += $difference;
                $user->profit += $difference;
                $user->save();
            }
        }

        return redirect()->back()->with('success', 'Trade profit updated successfully!');
    }

    /**
     * Close a Trade Room trade (change status from Open to Closed)
     */
    public function closeTradeRoom($id)
    {
        $trade = Trade::findOrFail($id);
        
        // Only allow closing if trade is currently Open (status = 1)
        if ($trade->status == 1) {
            $trade->status = 2; // Set to Closed
            $trade->save();

            if ($trade->acct_type == 'Live') {
                $user = User::find($trade->user_id);
                if ($user) {
                    // Only return the principal amount
                    // Profit is assumed to be handled via updateTradeRoomProfit streaming
                    $user->balance += $trade->amount;
                    $user->save();
                }
            }

            return redirect()->back()->with('success', 'Trade closed successfully!');
        }

        return redirect()->back()->with('error', 'Only open trades can be closed.');
    }
}
