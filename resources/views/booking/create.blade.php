<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8">
                <h2 class="text-gold mb-4 text-center">{{ __('ui.book_your_room') }}</h2>

                {{-- messaggio successo --}}
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- inizio form --}}
                <form action="{{ route('booking.store') }}" method="POST" id="booking-form">
                    @csrf

                    {{-- Nome e Cognome --}}
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="guest_first_name" class="form-label">{{ __('ui.first_name') }}</label>
                            <input type="text" name="guest_first_name" id="guest_first_name" class="form-control"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="guest_last_name" class="form-label">{{ __('ui.last_name') }}</label>
                            <input type="text" name="guest_last_name" id="guest_last_name" class="form-control"
                                required>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="guest_email" class="form-label">{{ __('ui.email') }}</label>
                        <input type="email" name="guest_email" id="guest_email" class="form-control" required>
                    </div>

                    {{-- Indirizzo di residenza --}}
                    <div class="mb-3">
                        <label for="guest_address_street" class="form-label">{{ __('ui.street') }}</label>
                        <input type="text" name="guest_address_street" id="guest_address_street" class="form-control"
                            required>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="guest_address_city" class="form-label">{{ __('ui.city') }}</label>
                            <input type="text" name="guest_address_city" id="guest_address_city" class="form-control"
                                required>
                        </div>
                        <div class="col-md-3">
                            <label for="guest_address_zip" class="form-label">{{ __('ui.zip') }}</label>
                            <input type="text" name="guest_address_zip" id="guest_address_zip" class="form-control"
                                required>
                        </div>
                        <div class="col-md-3">
                            <label for="guest_address_country" class="form-label">{{ __('ui.country') }}</label>
                            <select name="guest_address_country" id="guest_address_country" class="form-select"
                                required>
                                <option value="">{{ __('ui.select_country') }}</option>
                                <option value="IT">Italia</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                                <option value="ES">Spain</option>
                                <option value="US">United States</option>
                                <option value="GB">United Kingdom</option>
                            </select>
                        </div>
                    </div>

                    {{-- Selezione Camera --}}
                    <div class="mb-3">
                        <label for="room_name" class="form-label">{{ __('ui.room') }}</label>
                        <select name="room_name" id="room_name" class="form-select" required>
                            <option value="Green Room"
                                {{ old('room_name', $selectedRoom ?? '') == 'Green Room' ? 'selected' : '' }}>Green
                                Room</option>
                            <option value="Pink Room"
                                {{ old('room_name', $selectedRoom ?? '') == 'Pink Room' ? 'selected' : '' }}>Pink Room
                            </option>
                            <option value="Gray Room"
                                {{ old('room_name', $selectedRoom ?? '') == 'Gray Room' ? 'selected' : '' }}>Gray Room
                            </option>
                        </select>
                    </div>

                    {{-- Numero ospiti --}}
                    <div class="mb-3">
                        <label for="guests" class="form-label">{{ __('ui.guests') }}</label>
                        <select name="guests" id="guests" class="form-select" required>
                            <option value="">Seleziona</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    {{-- Date --}}
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="check_in" class="form-label">{{ __('ui.checkin') }}</label>
                            <input type="text" name="check_in" id="check_in" class="form-control" required disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="check_out" class="form-label">{{ __('ui.checkout') }}</label>
                            <input type="text" name="check_out" id="check_out" class="form-control" required
                                disabled>
                        </div>
                    </div>

                    {{-- Dati carta di credito --}}
                    <div class="mb-3">
                        <label for="card_holder_name" class="form-label">{{ __('ui.card_holder') }}
                            <small class="text-muted">{{ __('ui.card_holder_hint') }}</small></label>
                        <input type="text" id="card_holder_name" class="form-control"
                            placeholder="{{ __('ui.card_holder_placeholder') }}">
                    </div>

                    <div class="mb-4">
                        <label for="card-element" class="form-label">{{ __('ui.card_data') }}</label>
                        <div id="card-element" class="form-control p-3 rounded" style="height:auto;"></div>
                        <div id="card-errors" class="text-danger mt-2"></div>
                        <small class="text-muted">{{ __('ui.card_note') }}</small>
                    </div>

                    {{-- Prezzo Totale --}}
                    <div class="mb-3">
                        <label class="form-label">{{ __('ui.total_price') }}</label>
                        <div id="price_display" class="fs-5 fw-semibold">
                            {{ __('ui.total') }}: <span class="text-gold">—</span>
                        </div>
                    </div>

                    {{-- accettazione clausole --}}
                    <div class="form-check mt-4">
                        <input class="form-check-input @error('accetta_condizioni') is-invalid @enderror"
                            type="checkbox" id="accetta_condizioni" name="accetta_condizioni" value="1"
                            required>
                        <label class="form-check-label" for="accetta_condizioni">
                            {{ __('ui.terms') }}
                            <a href="{{ route('termini') }}" target="_blank"
                                class="text-gold text-decoration-underline">
                                {{ __('ui.terms_link') }}
                            </a>
                            {{ __('ui.terms_note') }}
                        </label>
                        @error('accetta_condizioni')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div id="loading-overlay"
                        class="d-none position-fixed top-0 start-0 w-100 h-100 bg-white bg-opacity-75 z-3 d-flex justify-content-center align-items-center">
                        <div class="text-center">
                            <div class="spinner-border text-gold mb-3" style="width: 3rem; height: 3rem;"
                                role="status"></div>
                            <p class="text-muted">{{ __('ui.processing') }}</p>
                        </div>
                    </div>
                    <input type="hidden" name="payment_method" id="payment_method">

                    <button type="submit"
                        class="btn btn-gold rounded-pill w-100">{{ __('ui.confirm_booking') }}</button>
                </form>

                {{-- Condizioni --}}
                <div class="mt-5 p-4 border rounded bg-light">
                    <h5 class="text-gold">{{ __('ui.booking_conditions') }}</h5>
                    <ul class="text-muted mb-0">
                        <li>{{ __('ui.pay_on_arrival') }}</li>
                        <li>{{ __('ui.tourist_tax') }}</li>
                        <li>{{ __('ui.cancel_5_days') }}</li>
                        <li>{{ __('ui.no_show') }}</li>
                        <li>{{ __('ui.checkin_time') }}</li>
                        <li>{{ __('ui.privacy_note') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Flatpickr + Stripe --}}
    @vite(['resources/js/booking.js'])
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');

        card.on('change', function(event) {
            document.getElementById('card-errors').textContent = event.error ? event.error.message : '';
        });

        const form = document.getElementById('booking-form');
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            document.getElementById('loading-overlay').classList.remove('d-none');

            const cardHolderInput = document.getElementById('card_holder_name');
            const cardHolderName = cardHolderInput.value.trim() !== '' ? cardHolderInput.value.trim() :
                document.getElementById('guest_first_name').value + ' ' + document.getElementById(
                    'guest_last_name').value;

            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                '{{ $intent->client_secret }}', {
                    payment_method: {
                        card: card,
                        billing_details: {
                            name: cardHolderName,
                            email: document.getElementById('guest_email').value,
                            address: {
                                line1: document.getElementById('guest_address_street').value,
                                city: document.getElementById('guest_address_city').value,
                                postal_code: document.getElementById('guest_address_zip').value,
                                country: document.getElementById('guest_address_country').value
                                .toUpperCase()
                            }
                        }
                    }
                }
            );

            if (error) {
                document.getElementById('card-errors').textContent = error.message;
                document.getElementById('loading-overlay').classList.add('d-none');
            } else {
                document.getElementById('payment_method').value = setupIntent.payment_method;
                form.submit();
            }
        });
    </script>
</x-layout>
