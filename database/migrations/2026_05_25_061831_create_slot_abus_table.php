<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('slot_abu', function (Blueprint $table) {
            $table->increments('slot_id');
            $table->integer('admin_id')->unsigned(); // Tipe data wajib sama dengan admin_id di tabel admin
            $table->string('slot_name', 150);
            $table->enum('slot_level', ['Biasa', 'VIP'])->default('Biasa');
            $table->enum('slot_status', ['Tersedia', 'Telah Diambil'])->default('Tersedia');
            $table->decimal('slot_price', 15, 2);
            $table->timestamp('slot_created_at')->useCurrent();
            $table->timestamp('slot_update_at')->useCurrent()->useCurrentOnUpdate();

            // Relasi Foreign Key ke tabel Admin
            $table->foreign('admin_id')
                  ->references('admin_id')
                  ->on('admin')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('slot_abu');
    }
};