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
            'slot_level' => 'VIP',
            'slot_status' => 'Tersedia',
            'slot_price' => 25000000,
        ]);

        SlotAbu::create([
            'admin_id' => 1,
            'slot_name' => 'A-02 (Baris Matahari)',
            'slot_level' => 'VIP',
            'slot_status' => 'Tersedia',
            'slot_price' => 25000000,
        ]);

        // Contoh Slot Telah Diambil
        SlotAbu::create([
            'admin_id' => 1,
            'slot_name' => 'B-15 (Baris Teratai)',
            'slot_level' => 'Biasa',
            'slot_status' => 'Telah Diambil',
            'slot_price' => 10000000,
        ]);
    }
}