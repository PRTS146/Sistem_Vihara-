<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    // Mengganti $fillable dengan $guarded agar kolom seperti phone & role otomatis bisa diisi
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Otomatis enkripsi password
        ];
    }

    // ==========================================
    // RELASI DATABASE (Sesuai rancangan Vihara)
    // ==========================================

    // Relasi ke Donasi
    public function donations() {
        return $this->hasMany(Donation::class);
    }

    // Relasi ke Transaksi
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    // Relasi ke Absensi
    public function attendances() {
        return $this->hasMany(Attendance::class);
    }

    // Relasi ke Event yang dibuat admin ini
    public function createdEvents() {
        return $this->hasMany(Event::class, 'created_by');
    }
}