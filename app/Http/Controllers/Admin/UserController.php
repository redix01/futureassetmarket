<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\FundingMail;
use App\Models\CryptoAsset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    public function verifyUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 2;
        $user->save();
        return redirect()->back()->with('success', 'User Verified Successfully');
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => ['required', 'integer', 'in:0,1,2'],
        ]);

        $user = User::findOrFail($id);
        $user->status = (int) $validated['status'];
        $user->save();

        return redirect()->back()->with('success', 'User verification status updated successfully.');
    }

    public function fundUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->type == 'add') {
            $user->balance += $request['balance'];
            $user->profit += $request['profit'];
            $user->balance += $request['profit'];
            $user->save();
            $data = ['user' => $user, 'balance' => $request['balance'], 'profit' => $request['profit']];
             Mail::to($user)->send(new FundingMail($data));
            return redirect()->back()->with('success', 'User Fund Successfully');
        }
        $user->balance -= $request['balance'];
        $user->profit -= $request['profit'];
        $user->save();
        return redirect()->back()->with('success', 'Debited Successfully');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function userAssets($id)
    {
        $user = User::findOrFail($id);
        $assets = CryptoAsset::where('user_id', $user->id)->get();
        return view('admin.user.user-asset', compact('user', 'assets'));
    }

}
