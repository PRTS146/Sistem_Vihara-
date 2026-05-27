<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 public function up()
{
    Schema::table('event', function (Blueprint $table) {
        $table->string('event_image')->nullable();
        $table->boolean('show_in_carousel')->default(false);
    });
}
};
