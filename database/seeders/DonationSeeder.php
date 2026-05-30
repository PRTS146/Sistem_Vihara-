<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donation;

class DonationSeeder extends Seeder
{
    public function run(): void
    {
        // 1. DONASI UMUM / PUBLIK (Sifatnya menetap, bukan karena kampanye tertentu)
        // Tetap diberi target berkala supaya tampilan progress card di halaman depan muncul dengan indah
        Donation::create([
            'admin_id' => 1,
            'donation_name' => 'Donasi Umum Sukarela (Operasional Vihara)',
            'donation_description' => 'Bagi umat yang ingin berdana secara umum tanpa terikat program tertentu. Dana ini digunakan untuk biaya operasional rutin vihara, listrik, air, dan pemeliharaan fasilitas sehari-hari.',
            'donation_target' => 100000000, // Rp 100.000.000 (Target tahunan/berkala)
            'donation_progress' => 45500000, // Rp 45.500.000 (Uang umum yang sudah terkumpul)
        ]);

        // 2. DONASI BERDASARKAN KAMPANYE TERTENTU (Ada target & tujuan khusus)
        Donation::create([
            'admin_id' => 1,
            'donation_name' => 'Kampanye Pembangunan Gedung Serbaguna',
            'donation_description' => 'Dana ini akan digunakan khusus untuk perluasan bangunan dan fasilitas gedung pertemuan bersama umat.',
            'donation_target' => 500000000,
            'donation_progress' => 12500000,
        ]);

        Donation::create([
            'admin_id' => 1,
            'donation_name' => 'Kampanye Dana Makan Bhikkhu (Pindapata)',
            'donation_description' => 'Kesempatan berdana makanan, jubah, dan obat-obatan untuk mendukung kehidupan sehari-hari para Bhikkhu Sangha.',
            'donation_target' => 20000000,
            'donation_progress' => 18500000,
        ]);
    }
}