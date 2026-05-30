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
// RUTE PUBLIK (Landing Page)
Route::get('/', [ViharaController::class, 'home'])->name('mainpage');

Route::post('/event/register/{id}', [EventController::class, 'registerEvent'])->name('event.register');

// AREA KHUSUS ADMIN (Wajib Login)
// Digembok rapat oleh middleware 'auth'. 
Route::middleware(['auth'])->group(function () {
    
    // Halaman Utama Admin
    Route::get('/monitoring', [AdminController::class, 'monitoring'])->name("monitoring");
    Route::get('/adminhome', [AdminController::class, 'adminhome'])->name('adminhome');

    Route::get('/profile', [ViharaController::class, 'profile'])->name('profile');
    
    //Rute slot abu
    Route::post('/slot/simpan', [SlotAbuController::class, 'store'])->name('slot.store');
    Route::put('/slot/update/{id}', [SlotAbuController::class, 'update'])->name('slot.update');
    Route::delete('/slot/hapus/{id}', [SlotAbuController::class, 'destroy'])->name('slot.destroy');
    // Rute event
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    // Rute CRUD Donasi
    Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');
    Route::put('/donations/{id}', [DonationController::class, 'update'])->name('donations.update');
    Route::delete('/donations/{id}', [DonationController::class, 'destroy'])->name('donations.destroy');

    Route::put('/admin/slots/status', [AdminController::class, 'updateSlotStatus'])->name('admin.slots.updateStatus');
});