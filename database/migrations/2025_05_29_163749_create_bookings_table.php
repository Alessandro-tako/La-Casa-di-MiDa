<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('guest_first_name');
            $table->string('guest_last_name');
            $table->string('guest_email');
            $table->string('guest_address_street');
            $table->string('guest_address_city');
            $table->string('guest_address_country');
            $table->string('guest_address_zip');
            $table->string('room_name'); // Green Room, Pink Room, Gray Room
            $table->date('check_in');
            $table->date('check_out');
            $table->unsignedTinyInteger('guests');
            $table->decimal('price', 8, 2);
            $table->string('status')->default('in_attesa');
            $table->string('payment_method');
            $table->boolean('penale_addebitata')->default(false);
            $table->string('penale_ricevuta_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
