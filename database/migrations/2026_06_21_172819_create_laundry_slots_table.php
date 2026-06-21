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
        Schema::create('laundry_slots', function (Blueprint $table) {
            $table->id();
            $table->date('available_date');
            $table->string('time_slot');
            $table->integer('max_quota')->default(5);
            $table->integer('current_quota')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundry_slots');
    }
};
