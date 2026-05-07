<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [viharaController::class,'index'])->name("mainPage");
Route::get('/dashboard', [viharaController::class,'dashboard'])->name("dashboard");