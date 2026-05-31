<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SlotAbu;

class SlotAbuSeeder extends Seeder
{
    public function run(): void
    {
        // Contoh Slot Tersedia
        SlotAbu::create([
            'admin_id' => 1,
            'slot_name' => 'A-01 (Baris Matahari)',
            // 'slot_level' => 'VIP', // <-- Diubah dari slot_level menjadi slot_type
            'slot_price' => 25000000,
            // 'slot_description' => 'Slot abu posisi strategis di blok VIP baris matahari.', // <-- Ditambahkan sesuai tabel
            'slot_status' => 'Tersedia',
        ]);

        SlotAbu::create([
            'admin_id' => 1,
            'slot_name' => 'A-02 (Baris Matahari)',
            // 'slot_level' => 'VIP', 
            'slot_price' => 25000000,
            // 'slot_description' => 'Slot abu posisi strategis di blok VIP baris matahari.', 
            'slot_status' => 'Tersedia',
        ]);

        // Contoh Slot Telah Diambil
        SlotAbu::create([
            'admin_id' => 1,
            'slot_name' => 'B-15 (Baris Teratai)',
            // 'slot_level' => 'Biasa',
            'slot_price' => 10000000,
            // 'slot_description' => 'Slot abu standar di baris teratai.', 
            'slot_status' => 'Telah Diambil',
        ]);
    }
}