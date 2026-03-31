<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\OtpAuthController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [OtpAuthController::class, 'register'])->name('register.post')->middleware('throttle:register');

Route::get('/otp/verify', function () {
    return view('auth.verify-otp', [
        'email' => request('email')
    ]);
})->name('otp.form');

Route::get('/forgot-password', function () {
    return view('auth.forgot');
})->name('password.request');

Route::get('/reset-password', function () {
    return view('auth.reset-password', [
        'email' => request('email')
    ]);
})->name('password.reset.form');

Route::post('/reset-password', [OtpAuthController::class, 'reset'])
    ->name('password.reset');

Route::post('/otp/verify', [OtpAuthController::class, 'verify'])->name('otp.verify')->middleware('throttle:verify');

Route::post('/otp/resend', [OtpAuthController::class, 'resend'])->name('otp.resend')->middleware('throttle:3,1');

Route::post('/otp/resend/forgot', [OtpAuthController::class, 'forgot'])->name('otp.forgot')->middleware('throttle:3,1');

Route::middleware('auth')->group(function () {
   
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('/set-password', [PasswordController::class, 'setPassword'])->name('password.set');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
