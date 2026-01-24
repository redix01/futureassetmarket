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
        $trade->profit = $request->profit;
        $trade->save();

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
                    // Return principal amount + profit
                    $user->balance += $trade->amount + $trade->profit;
                    $user->profit += $trade->profit;
                    $user->save();
                }
            }

            return redirect()->back()->with('success', 'Trade closed successfully!');
        }

        return redirect()->back()->with('error', 'Only open trades can be closed.');
    }
}
