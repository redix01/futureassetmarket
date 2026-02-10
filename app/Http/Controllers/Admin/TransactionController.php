<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApproveDeposit;
use App\Mail\ApproveWithdrawal;
use App\Mail\WithdrawalMail;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    public function deposits()
    {
        $deposits = Deposit::all();
        return view('admin.transaction.deposits', compact('deposits'));
    }

    public function approveDeposit($id)
    {
        $data = Deposit::findOrFail($id);
        $data->status = 1;
        $data->save();
        $user = User::find($data->user_id);
        $user->balance += $data->amount;
        $user->save();
        Mail::to($user->email)->send(new ApproveDeposit($data));
        return redirect()->back()->with('success', 'Deposit Approved Successfully');
    }

    public function declineDeposit($id)
    {
        $data = Deposit::findOrFail($id);
        $data->status = 2;
        $data->save();
        return redirect()->back()->with('success', 'Deposit Declined Successfully');
    }

    public function withdraws()
    {
        $withdraws = Withdrawal::all();
        return view('admin.transaction.withdraws', compact('withdraws'));
    }

    public function approveWithdraw(Request $request, $id)
    {
        $withdraw = Withdrawal::findOrFail($id);
        $withdraw->status = 1;
        $withdraw->save();
        $user = User::find($withdraw->user_id);
        $user->balance -= $withdraw->amount;
        $user->save();
        Mail::to($user)->send(new ApproveWithdrawal($withdraw));
        return redirect()->back()->with('success', 'Withdraw Approved');
    }

    public function declineWithdraw($id)
    {
        $withdraw = Withdrawal::findOrFail($id);
        $withdraw->status = 2;
        $withdraw->save();
        return redirect()->back()->with('success', 'Withdraw Declined Successfully');
    }
}
