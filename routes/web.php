<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\PainController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TherapistController;
use App\Http\Controllers\AppointmentController;

Route::get('/', [PainController::class, 'index'])->name('home');

Route::get('/service', [ServiceController::class, 'index'])->name('service');
Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/aboutUs', [TherapistController::class, 'about'])->name('about_us');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/auth/google/redirect', [SocialAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

Route::get('/pain/{slug}', [PainController::class, 'show'])->name('pain.show');

require __DIR__ . '/auth.php';

