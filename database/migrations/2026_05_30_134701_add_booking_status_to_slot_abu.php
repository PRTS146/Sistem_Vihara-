<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Change the enum to include 'Booking' as a status option
        DB::statement("ALTER TABLE slot_abu MODIFY slot_status ENUM('Tersedia', 'Booking', 'Telah Diambil') DEFAULT 'Tersedia'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE slot_abu MODIFY slot_status ENUM('Tersedia', 'Telah Diambil') DEFAULT 'Tersedia'");
    }
};
