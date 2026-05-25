<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donation', function (Blueprint $table) {
            $table->increments('donation_id');
            $table->integer('admin_id')->unsigned();
            $table->string('donation_name', 200);
            $table->text('donation_description')->nullable();
            $table->decimal('donation_target', 15, 2)->default(0.00);
            $table->decimal('donation_progress', 15, 2)->default(0.00);
            $table->timestamp('donation_created_at')->useCurrent();
            $table->timestamp('donation_update_at')->useCurrent()->useCurrentOnUpdate();

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
        Schema::dropIfExists('donation');
    }
};