<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            // foreignId adalah cara cepat Laravel membuat relasi Foreign Key
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('donor_name');
            $table->decimal('amount', 15, 2);
            $table->string('payment_proof');
            $table->text('message')->nullable();
            $table->enum('status', ['pending', 'verified'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
