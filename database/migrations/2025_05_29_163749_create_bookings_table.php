<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // Dati ospite
            $table->string('guest_first_name');
            $table->string('guest_last_name');
            $table->string('guest_email');
            $table->string('guest_address_street');
            $table->string('guest_address_city');
            $table->string('guest_address_country');
            $table->string('guest_address_zip');

            // Locale dell'interfaccia usata dall'utente
            $table->string('locale', 5)->default('it');

            // Dettagli prenotazione
            $table->string('room_name');
            $table->date('check_in');
            $table->date('check_out');
            $table->unsignedTinyInteger('guests');
            $table->decimal('price', 8, 2);

            // Stato e pagamento
            $table->string('status')->default('in_attesa');
            $table->string('payment_method');
            $table->string('stripe_payment_method')->nullable();
            $table->string('stripe_customer_id')->nullable();

            // Penale
            $table->boolean('penale_addebitata')->default(false);
            $table->string('penale_ricevuta_url')->nullable();
            $table->string('penale_pdf_path')->nullable();

            // Accettazione termini
            $table->boolean('terms_accepted')->default(false);
            $table->timestamp('terms_accepted_at')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->text('user_agent')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
