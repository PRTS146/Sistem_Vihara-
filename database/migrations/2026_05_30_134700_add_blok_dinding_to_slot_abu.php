<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('slot_abu', function (Blueprint $table) {
            $table->string('slot_blok', 10)->default('A')->after('admin_id');
            $table->string('slot_dinding', 10)->default('1')->after('slot_blok');
        });
    }

    public function down(): void
    {
        Schema::table('slot_abu', function (Blueprint $table) {
            $table->dropColumn(['slot_blok', 'slot_dinding']);
        });
    }
};
