<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViharaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SlotAbuController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EventController;

// =================================================================
// 🌍 RUTE PUBLIK (Landing Page)
// Bisa diakses oleh siapa saja (Guest/Umat) tanpa perlu login
// =================================================================
Route::get('/', [ViharaController::class, 'home'])->name("mainpage");

// *Catatan: Kamu tidak perlu menulis rute /login atau /logout di sini. 
// Mesin Laravel Fortify sudah otomatis membuatnya di belakang layar!


// =================================================================
// 🔒 AREA KHUSUS ADMIN (Wajib Login)
// Digembok rapat oleh middleware 'auth'. 
// =================================================================
Route::middleware(['auth'])->group(function () {
    
    // Halaman Utama Admin (Dashboard Monitoring)
    // Kita arahkan ke AdminController yang baru kita buat tadi
    Route::get('/monitoring', [AdminController::class, 'index'])->name("monitoring");
    
    // Jika masih ada halaman adminhome bawaan lama
    Route::get('/adminhome', [ViharaController::class, 'adminhome'])->name('adminhome');

    // Nanti, rute untuk menyimpan data (CRUD) akan kita kumpulkan di sini
    // Contoh persiapan:
    // Route::post('/donasi/simpan', [DonationController::class, 'store'])->name('donasi.store');
    // Route::post('/event/simpan', [EventController::class, 'store'])->name('event.store');
    // Route::post('/slot/simpan', [SlotAbuController::class, 'store'])->name('slot.store');

});