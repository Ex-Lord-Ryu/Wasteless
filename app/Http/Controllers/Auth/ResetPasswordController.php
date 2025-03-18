<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function showResetForm(Request $request)
    {
        if (!$request->has('email')) {
            return redirect()->route('password.request');
        }

        // Check if user has verified OTP (otp should be null after verification)
        $passwordReset = DB::table('password_resets')
            ->where('email', $request->email)
            ->whereNull('otp')
            ->first();

        if (!$passwordReset) {
            return redirect()->route('password.request')
                ->withErrors(['email' => 'Please verify your OTP first.']);
        }

        return view('auth.passwords.reset', ['email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Check if user has verified OTP
        $passwordReset = DB::table('password_resets')
            ->where('email', $request->email)
            ->whereNull('otp')
            ->first();

        if (!$passwordReset) {
            return back()->withErrors(['email' => 'Invalid password reset request.']);
        }

        // Update the user's password
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the password reset record
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')
            ->with('status', 'Your password has been reset successfully!');
    }
}
