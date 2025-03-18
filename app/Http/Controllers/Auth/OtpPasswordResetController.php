<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OtpPasswordResetController extends Controller
{
    /**
     * Display the email form for password reset.
     *
     * @return \Illuminate\View\View
     */
    public function showEmailForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Display the OTP verification form.
     *
     * @return \Illuminate\View\View
     */
    public function showOtpForm(Request $request)
    {
        if (!$request->has('email')) {
            return redirect()->route('password.request');
        }
        return view('auth.passwords.otp-verification', ['email' => $request->email]);
    }

    /**
     * Send OTP for password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Get user
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'We can\'t find a user with that email address.']);
        }

        // Generate a 6-digit OTP
        $otp = sprintf("%06d", mt_rand(1, 999999));

        // Store OTP in password_resets table
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'otp' => $otp,
                'created_at' => Carbon::now()
            ]
        );

        // Send OTP email
        $user->notify(new \App\Notifications\OtpResetPasswordNotification($otp));

        return redirect()->route('password.otp', ['email' => $request->email])
            ->with('status', 'We have emailed your password reset OTP!');
    }

    /**
     * Verify OTP and redirect to reset password form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp_code' => 'required|array|size:6',
            'otp_code.*' => 'required|numeric|digits:1',
        ]);

        // Combine OTP digits
        $otp = implode('', $request->otp_code);

        // Check if OTP exists and is valid
        $passwordReset = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('otp', $otp)
            ->first();

        if (!$passwordReset) {
            return back()->withErrors(['otp_code' => 'Invalid OTP code.']);
        }

        // Check if OTP is expired (15 minutes)
        $createdAt = Carbon::parse($passwordReset->created_at);
        if (Carbon::now()->diffInMinutes($createdAt) > 15) {
            return back()->withErrors(['otp_code' => 'OTP has expired. Please request a new one.']);
        }

        // Clear OTP after successful verification
        DB::table('password_resets')
            ->where('email', $request->email)
            ->update([
                'otp' => null
            ]);

        // Redirect to password reset form
        return redirect()->route('password.reset', ['email' => $request->email]);
    }
}
