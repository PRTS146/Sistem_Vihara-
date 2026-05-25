<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema; // Jangan lupa tambahkan ini

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Matikan sementara pengecekan Foreign Key
        Schema::disableForeignKeyConstraints();

        // 2. Kosongkan tabel admin agar tidak duplikat
        Admin::truncate();

        // 3. Nyalakan kembali pengecekan Foreign Key
        Schema::enableForeignKeyConstraints();

        // 4. Buat akun baru
        Admin::create([
            'admin_name' => 'admin@test.com',
            'admin_password' => Hash::make('Admin123'), 
        ]);
    }
}