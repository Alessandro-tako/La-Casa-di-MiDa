<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('guest_address_street')->after('guest_email');
            $table->string('guest_address_city')->after('guest_address_street');
            $table->string('guest_address_country')->after('guest_address_city');
            $table->string('guest_address_zip')->after('guest_address_country');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'guest_address_street',
                'guest_address_city',
                'guest_address_country',
                'guest_address_zip',
            ]);
        });
    }
};
