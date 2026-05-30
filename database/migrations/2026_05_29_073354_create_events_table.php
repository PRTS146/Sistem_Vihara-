<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id'); 
            $table->integer('admin_id')->unsigned()->nullable();
            $table->string('event_name');
            $table->text('event_description');
            
            $table->date('event_date'); 
            $table->time('event_time');

            $table->string('event_status')->default('Active'); 

            $table->integer('event_counter')->default(0); 
            
            $table->timestamp('event_created_at')->useCurrent();
            $table->timestamp('event_update_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('admin_id')
                  ->references('admin_id')
                  ->on('admin')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events'); 
    }
};