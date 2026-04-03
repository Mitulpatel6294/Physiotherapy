<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\PainController;


Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/service', function () {
    return view('service');
})->name('service');
Route::get('/aboutUs', function () {
    return view('about');
})->name('about_us');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

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

Route::get('/', [PainController::class, 'index'])->name('home');
Route::get('/pain/{slug}', [PainController::class, 'show'])->name('pain.show');

require __DIR__ . '/auth.php';
