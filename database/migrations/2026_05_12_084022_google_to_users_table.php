<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan google_id
            $table->string('google_id')->nullable()->after('email');
            
            $table->string('google_token')->nullable()->after('google_id');

            $table->string('google_refresh_token')->nullable()->after('google_token');

            // Menghapus kolom phone
            $table->dropColumn('phone');
            
            // Mengubah password agar tidak wajib diisi
            $table->string('password')->nullable()->change();
            
            // Otomatis mengisi role 'user' untuk pendaftar baru
            $table->enum('role', ['admin', 'user'])->default('user')->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('google_id');
            $table->string('phone')->nullable()->after('password'); // Mengembalikan kolom phone jika di-rollback
            $table->string('password')->nullable(false)->change();
        });
    }
};
