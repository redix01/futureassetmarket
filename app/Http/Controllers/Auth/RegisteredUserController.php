<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\NewUserMail;
use App\Models\Referral;
use App\Models\User;
use App\Notifications\NewUserRegistered;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email:rfc,dns', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'username' => ['required', 'unique:'.User::class],
//            'captcha' => 'required|captcha',
        ]);

        $refCode = $request->input('ref') ?? $request->query('ref');
    \Log::info('Ref code: ' . ($refCode ?? 'none'));

    $referrer = null;
    if ($refCode) {
        $referrerReferral = Referral::where('code', $refCode)->first();
        $referrer = $referrerReferral ? $referrerReferral->user_id : null;
        \Log::info("Referral lookup - Code: {$refCode}, Referrer ID: " . ($referrer ?? 'none'));
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'username' => $request->username,
        'pass' => $request->password,
        'status' => 0,
    ]);

    $referral = new Referral();
    $referral->referrer_id = $referrer;
    $user->referral()->save($referral);


        event(new Registered($user));

        $user->sendEmailVerificationNotification();

        Auth::login($user);
        $admin = User::where('role', 'admin')->first();
        Mail::to($admin)->send(new NewUserMail($user));
        return redirect(route('user.dashboard', absolute: false));
    }
}
