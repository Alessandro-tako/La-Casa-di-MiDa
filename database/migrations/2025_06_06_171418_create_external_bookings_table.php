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
        Schema::create('external_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('room_name'); // es: Green Room
            $table->date('check_in');
            $table->date('check_out');
            $table->string('uid')->unique(); // UID evento .ics
            $table->string('source'); // 'booking.com' o 'airbnb'
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_bookings');
    }
};
