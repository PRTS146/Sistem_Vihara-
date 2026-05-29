<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViharaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SlotAbuController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EventController;
use App\Models\Event;

// RUTE PUBLIK (Landing Page)
// Bisa diakses oleh siapa saja (Guest/Umat) tanpa perlu login
Route::get('/', function () {
    $events = Event::all();
    return view('vihara.home', compact('events'));
})->name('mainpage');

// AREA KHUSUS ADMIN (Wajib Login)
// Digembok rapat oleh middleware 'auth'. 
Route::middleware(['auth'])->group(function () {
    
    // Halaman Utama Admin (Dashboard Monitoring)
    // Kita arahkan ke AdminController yang baru kita buat tadi
    Route::get('/monitoring', [AdminController::class, 'index'])->name("monitoring");
    Route::get('/adminhome', [ViharaController::class, 'adminhome'])->name('adminhome');
    // routes/web.php

    Route::get('/monitoring', [ViharaController::class, 'monitoring']);
    // Jika masih ada halaman adminhome bawaan lama
    Route::get('/profile', [ViharaController::class, 'profile'])->name('profile');

    Route::post('/slot/simpan', [SlotAbuController::class, 'store'])->name('slot.store');
    Route::put('/slot/update/{id}', [SlotAbuController::class, 'update'])->name('slot.update');
    Route::delete('/slot/hapus/{id}', [SlotAbuController::class, 'destroy'])->name('slot.destroy');

    // Rute CRUD Donasi
    Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');
    Route::put('/donations/{id}', [DonationController::class, 'update'])->name('donations.update');
    Route::delete('/donations/{id}', [DonationController::class, 'destroy'])->name('donations.destroy');
});