<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViharaController;
use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Auth;

// --- RUTE PUBLIK ---
Route::get('/', [ViharaController::class,'home'])->name("mainpage");
Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

// --- SIMPANG JALAN (Setelah Login) ---
Route::get('/home', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('monitoring');
    }
    return redirect()->route('dashboard');
})->middleware('auth');

// --- AREA USER (Tugas Vincent) ---
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [ViharaController::class, 'dashboard'])->name('dashboard');
    Route::get('/abu', [ViharaController::class, 'abu'])->name('abu');
});

// --- AREA ADMIN (Tugas Kelvin) ---
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/monitoring', [ViharaController::class, 'monitoring'])->name("monitoring");
});

// profile
Route::get('/profile', [ViharaController::class, 'profile'])->name('profile');
Route::put('/profile', [ViharaController::class, 'profileUpdate'])->name('profile.update');