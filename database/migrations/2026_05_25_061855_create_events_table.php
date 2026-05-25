<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event', function (Blueprint $table) {
            $table->increments('event_id');
            $table->integer('admin_id')->unsigned(); // FK ke admin
            $table->string('event_name', 200);
            $table->date('event_date');
            $table->text('event_description')->nullable();
            
            // Kolom waktu bawaan rancanganmu
            $table->timestamp('event_created_at')->useCurrent();
            $table->timestamp('event_update_at')->useCurrent()->useCurrentOnUpdate();

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
        Schema::dropIfExists('event');
    }
};