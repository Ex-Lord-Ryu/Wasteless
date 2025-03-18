<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ProfileController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Http\Controllers\Auth\OtpPasswordResetController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\MitraRegisterController;

Route::get('/', function () {
    return view('welcome');
});

// Disable ALL default password reset routes
Auth::routes(['reset' => false, 'password.email' => false, 'password.reset' => false]);

// Custom Password Reset Routes
Route::group(['prefix' => 'password'], function() {
    Route::get('reset', [OtpPasswordResetController::class, 'showEmailForm'])->name('password.request');
    Route::post('email', [OtpPasswordResetController::class, 'sendOtp'])->name('password.email');
    Route::get('otp', [OtpPasswordResetController::class, 'showOtpForm'])->name('password.otp');
    Route::post('otp/verify', [OtpPasswordResetController::class, 'verifyOtp'])->name('password.otp.verify');
    Route::get('reset/form', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('update', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::get('/blank-page', [App\Http\Controllers\HomeController::class, 'blank'])->name('blank');

    Route::get('/hakakses', [App\Http\Controllers\HakaksesController::class, 'index'])->name('hakakses.index')->middleware('superadmin');
    Route::get('/hakakses/edit/{id}', [App\Http\Controllers\HakaksesController::class, 'edit'])->name('hakakses.edit')->middleware('superadmin');
    Route::put('/hakakses/update/{id}', [App\Http\Controllers\HakaksesController::class, 'update'])->name('hakakses.update')->middleware('superadmin');
    Route::delete('/hakakses/delete/{id}', [App\Http\Controllers\HakaksesController::class, 'destroy'])->name('hakakses.delete')->middleware('superadmin');

    Route::get('/table-example', [App\Http\Controllers\ExampleController::class, 'table'])->name('table.example');
    Route::get('/clock-example', [App\Http\Controllers\ExampleController::class, 'clock'])->name('clock.example');
    Route::get('/chart-example', [App\Http\Controllers\ExampleController::class, 'chart'])->name('chart.example');
    Route::get('/form-example', [App\Http\Controllers\ExampleController::class, 'form'])->name('form.example');
    Route::get('/map-example', [App\Http\Controllers\ExampleController::class, 'map'])->name('map.example');
    Route::get('/calendar-example', [App\Http\Controllers\ExampleController::class, 'calendar'])->name('calendar.example');
    Route::get('/gallery-example', [App\Http\Controllers\ExampleController::class, 'gallery'])->name('gallery.example');
    Route::get('/todo-example', [App\Http\Controllers\ExampleController::class, 'todo'])->name('todo.example');
    Route::get('/contact-example', [App\Http\Controllers\ExampleController::class, 'contact'])->name('contact.example');
    Route::get('/faq-example', [App\Http\Controllers\ExampleController::class, 'faq'])->name('faq.example');
    Route::get('/news-example', [App\Http\Controllers\ExampleController::class, 'news'])->name('news.example');
    Route::get('/about-example', [App\Http\Controllers\ExampleController::class, 'about'])->name('about.example');
});

// Google Login Routes
Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google');

Route::get('/auth/google/callback', function () {
    try {
        $user = Socialite::driver('google')->user();

        $finduser = \App\Models\User::where('google_id', $user->id)->first();

        if($finduser) {
            Auth::login($finduser);
            return redirect()->intended('home');
        } else {
            $newUser = \App\Models\User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id'=> $user->id,
                'password' => bcrypt(Str::random(16))
            ]);

            Auth::login($newUser);
            return redirect()->intended('home');
        }
    } catch (\Exception $e) {
        return redirect()->route('login')->with('error', 'Google authentication failed');
    }
})->name('auth.google.callback');

// Mitra Registration Routes
Route::get('/mitra/register', [MitraRegisterController::class, 'showRegistrationForm'])
    ->name('mitra.register');
Route::post('/mitra/register', [MitraRegisterController::class, 'register']);

Route::get('/edukasi', function () {
    return view('edukasi');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/mitra', function () {
    return view('mitra');
});

