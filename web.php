<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViharaController;
use App\Http\Controllers\GoogleAuthController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ViharaController::class,'home'])->name("mainpage");
Route::get('/dashboard', [ViharaController::class,'dashboard'])->name("dashboard");
Route::get('/abu', [ViharaController::class,'abu'])->name("abu");
// Route::get('/login', [ViharaController::class,'login'])->name("login");
// Route::get('/register', [ViharaController::class,'register'])->name("register");

// Rute "Login with Google"
Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');

// Rute Callback (Google Cloud Console)
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);