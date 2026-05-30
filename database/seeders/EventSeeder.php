<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::create([
            'admin_id' => 1,
            'event_name' => 'Perayaan Trisuci Waisak 2570 BE',
            'event_description' => 'Mari bersama-sama merayakan hari raya Trisuci Waisak. Akan ada sesi Dhammadesana, Pradaksina, dan meditasi bersama.',
            'event_date' => '2026-06-01',
            'event_time' => '09:00:00',
            'event_status' => 'Active',
            'event_counter' => 150,
        ]);

        Event::create([
            'admin_id' => 1,
            'event_name' => 'Kelas Meditasi Pemula',
            'event_description' => 'Pelatihan meditasi pernapasan (Anapanasati) yang dibimbing langsung oleh Bhante. Terbuka untuk umum.',
            'event_date' => '2026-06-15',
            'event_time' => '19:00:00',
            'event_status' => 'Active',
            'event_counter' => 30,
        ]);

        Event::create([
            'admin_id' => 1,
            'event_name' => 'Bakti Sosial Pengobatan Gratis',
            'event_description' => 'Kegiatan bakti sosial pengobatan gratis untuk warga sekitar vihara bekerja sama dengan tim medis relawan.',
            'event_date' => '2026-07-10',
            'event_time' => '08:00:00',
            'event_status' => 'Active',
            'event_counter' => 85,
        ]);
    }
}