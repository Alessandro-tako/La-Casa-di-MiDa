<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <h2 class="text-gold mb-4 text-center">Prenota la tua camera</h2>

                <form action="{{ route('booking.store') }}" method="POST" id="booking-form">
                    @csrf

                    {{-- Nome e Cognome --}}
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="guest_first_name" class="form-label">Nome</label>
                            <input type="text" name="guest_first_name" id="guest_first_name" class="form-control"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="guest_last_name" class="form-label">Cognome</label>
                            <input type="text" name="guest_last_name" id="guest_last_name" class="form-control"
                                required>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="guest_email" class="form-label">Email</label>
                        <input type="email" name="guest_email" id="guest_email" class="form-control" required>
                    </div>

                    {{-- Selezione Camera --}}
                    <div class="mb-3">
                        <label for="room_name" class="form-label">Camera</label>
                        <select id="room_name" class="form-select" required>
                            <option value="">Seleziona una camera</option>
                            <option value="Green Room">Green Room</option>
                            <option value="Pink Room">Pink Room</option>
                            <option value="Gray Room">Gray Room</option>
                        </select>

                    </div>

                    {{-- Date --}}
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="check_in" class="form-label">Check-in</label>
                            <input type="text" name="check_in" id="check_in" class="form-control" required disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="check_out" class="form-label">Check-out</label>
                            <input type="text" name="check_out" id="check_out" class="form-control" required
                                disabled>
                        </div>
                    </div>

                    {{-- Prezzo Totale --}}
                    <div class="mb-3">
                        <label class="form-label">Prezzo Totale</label>
                        <div id="price_display" class="fs-5 fw-semibold">
                            Totale: <span class="text-gold">—</span>
                        </div>
                    </div>




                    <button type="submit" class="btn btn-gold rounded-pill w-100">Conferma Prenotazione</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Flatpickr + logica --}}
    @vite(['resources/js/booking.js'])
</x-layout>
