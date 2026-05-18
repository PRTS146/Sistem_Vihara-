<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViharaController;
use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Auth;

// --- RUTE PUBLIK (Tidak perlu login) ---
Route::get('/', [ViharaController::class,'home'])->name("mainpage");
Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);


// --- SIMPANG JALAN (Setelah Login) ---
Route::get('/home', function () {
    if (Auth::user()->role === 'admin') {
        // Sementara admin diarahkan ke dashboard dulu sesuai request
        return redirect()->route('dashboard'); 
    }
    return redirect()->route('dashboard');
})->middleware('auth');


// --- 👥 AREA USER (Bisa diakses oleh User dan Admin) ---
// Middleware 'role:user' di sini akan mengizinkan User biasa DAN Admin untuk lewat
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [ViharaController::class, 'dashboard'])->name('dashboard');
    Route::get('/abu', [ViharaController::class, 'abu'])->name('abu');
    
    // Rute Profile dimasukkan ke sini agar aman dan wajib login
    Route::get('/profile', [ViharaController::class, 'profile'])->name('profile');
    Route::put('/profile', [ViharaController::class, 'profileUpdate'])->name('profile.update');
});


// --- 👑 AREA KHUSUS ADMIN (Tugas Kelvin) ---
// Middleware 'role:admin' akan memblokir User biasa yang mencoba masuk
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/monitoring', [ViharaController::class, 'monitoring'])->name("monitoring");
    Route::get('/adminhome', [ViharaController::class,'adminhome'])->name('adminhome');
});