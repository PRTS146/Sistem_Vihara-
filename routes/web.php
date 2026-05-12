<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViharaController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ViharaController::class,'home'])->name("mainpage");
Route::get('/dashboard', [ViharaController::class,'dashboard'])->name("dashboard");
Route::get('/abu', [ViharaController::class,'abu'])->name("abu");

// Route::get('/login', [ViharaController::class,'login'])->name("login");
// Route::get('/register', [ViharaController::class,'register'])->name("register");