<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8">
                <h2 class="text-gold mb-4 text-center">{{ __('ui.book_your_room') }}</h2>

                {{-- Messaggi --}}
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
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

                {{-- Form di prenotazione --}}
                <form action="{{ route('booking.store') }}" method="POST" id="booking-form">
                    @csrf

                    {{-- Info anagrafiche --}}
                    <div class="row mb-3">
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

                    <div class="mb-3">
                        <label for="guest_email" class="form-label">{{ __('ui.email') }}</label>
                        <input type="email" name="guest_email" id="guest_email" class="form-control" required>
                    </div>

                    {{-- Indirizzo --}}
                    <div class="mb-3">
                        <label for="guest_address_street" class="form-label">{{ __('ui.street') }}</label>
                        <input type="text" name="guest_address_street" id="guest_address_street" class="form-control"
                            required>
                    </div>

                    <div class="row mb-3">
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
                                <option value="">{{ __('ui.select_country') }}
                                </option>
                                <option value="AR">Argentina</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Österreich (Austria)</option>
                                <option value="BE">Belgique / België (Belgio)</option>
                                <option value="BR">Brasil (Brasile)</option>
                                <option value="CA">Canada</option>
                                <option value="CN">中国 (Cina)</option>
                                <option value="CO">Colombia</option>
                                <option value="CZ">Česká republika (Repubblica Ceca)
                                </option>
                                <option value="DE">Deutschland (Germania)</option>
                                <option value="DK">Danmark (Danimarca)</option>
                                <option value="ES">España (Spagna)</option>
                                <option value="FI">Suomi (Finlandia)</option>
                                <option value="FR">France (Francia)</option>
                                <option value="GB">United Kingdom (Regno Unito)</option>
                                <option value="GR">Ελλάδα (Grecia)</option>
                                <option value="HU">Magyarország (Ungheria)</option>
                                <option value="IE">Éire (Irlanda)</option>
                                <option value="IL">ישראל (Israele)</option>
                                <option value="IN">भारत (India)</option>
                                <option value="IT">Italia</option>
                                <option value="JP">日本 (Giappone)</option>
                                <option value="KR">대한민국 (Corea del Sud)</option>
                                <option value="MX">México</option>
                                <option value="NL">Nederland (Paesi Bassi)</option>
                                <option value="NO">Norge (Norvegia)</option>
                                <option value="NZ">New Zealand</option>
                                <option value="PL">Polska (Polonia)</option>
                                <option value="PT">Portugal (Portogallo)</option>
                                <option value="RO">România</option>
                                <option value="RU">Россия (Russia)</option>
                                <option value="SE">Sverige (Svezia)</option>
                                <option value="SG">Singapore</option>
                                <option value="SK">Slovensko (Slovacchia)</option>
                                <option value="TH">ประเทศไทย (Thailandia)</option>
                                <option value="TR">Türkiye (Turchia)</option>
                                <option value="UA">Україна (Ucraina)</option>
                                <option value="US">United States (Stati Uniti)</option>
                                <option value="ZA">South Africa (Sudafrica)</option>
                            </select>

                        </div>
                    </div>

                    {{-- Camera e ospiti --}}
                    <div class="mb-3">
                        <label for="room_name" class="form-label">{{ __('ui.room') }}</label>
                        <select name="room_name" id="room_name" class="form-select" required>
                            <option value="Green Room"
                                {{ old('room_name', $selectedRoom ?? '') == 'Green Room' ? 'selected' : '' }}>
                                {{ __('ui.green_room') }}</option>
                            <option value="Pink Room"
                                {{ old('room_name', $selectedRoom ?? '') == 'Pink Room' ? 'selected' : '' }}>
                                {{ __('ui.pink_room') }}
                            </option>
                            <option value="Grey Room"
                                {{ in_array(old('room_name', $selectedRoom ?? ''), ['Grey Room', 'Gray Room']) ? 'selected' : '' }}>
                                {{ __('ui.grey_room') }}
                            </option>

                        </select>
                    </div>

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
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="check_in" class="form-label">{{ __('ui.checkin') }}</label>
                            <input type="text" name="check_in" id="check_in" class="form-control" required
                                disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="check_out" class="form-label">{{ __('ui.checkout') }}</label>
                            <input type="text" name="check_out" id="check_out" class="form-control" required
                                disabled>
                        </div>
                    </div>

                    {{-- Dati Carta --}}
                    <div class="mb-3">
                        <label for="card_holder_name" class="form-label">{{ __('ui.card_holder') }}</label>
                        <input type="text" id="card_holder_name" class="form-control"
                            placeholder="{{ __('ui.card_holder_placeholder') }}">
                    </div>

                    <div class="mb-4">
                        <label for="card-element" class="form-label">{{ __('ui.card_data') }}</label>
                        <div id="card-element" class="form-control p-3 rounded" style="height:auto;"></div>
                        <div id="card-errors" class="text-danger mt-2"></div>
                    </div>

                    {{-- Prezzo --}}
                    <div class="mb-3">
                        <label class="form-label">{{ __('ui.total_price') }}</label>
                        <div id="price_display" class="fs-5 fw-semibold">
                            {{ __('ui.total') }}: <span class="text-gold">—</span>
                        </div>
                    </div>

                    {{-- nota per letto standard --}}
                    <div class="alert alert-warning my-4" role="alert">
                        <strong>{{ __('ui.important_note') }}</strong><br>
                        {{ __('ui.beds_notice') }}
                    </div>


                    {{-- Condizioni di prenotazione --}}
                    <div class="mt-5 p-4 border rounded bg-light mb-3">
                        <h5 class="text-gold d-flex align-items-center">
                            {{ __('ui.booking_conditions') }}
                            <i class="bi bi-info-circle ms-2" title="{{ __('ui.read_full_terms_tooltip') }}"></i>
                        </h5>
                        <ul class="text-muted mb-2">
                            <li>{{ __('ui.pay_on_arrival') }}</li>
                            <li>{{ __('ui.tourist_tax') }}</li>
                            <li>{{ __('ui.cancel_5_days') }}</li>
                            <li>{{ __('ui.no_show') }}</li>
                            <li>{{ __('ui.checkin_time') }}</li>
                            <li>{{ __('ui.privacy_note') }}</li>
                        </ul>
                        <small>
                            <a href="{{ route('termini') }}" target="_blank"
                                class="text-gold text-decoration-underline">
                                {{ __('ui.read_full_terms') }}
                            </a>
                        </small>
                    </div>


                    {{-- Termini --}}
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="accetta_condizioni"
                            name="accetta_condizioni" value="1" required>
                        <label class="form-check-label" for="accetta_condizioni">
                            {{ __('ui.terms') }}
                            <a href="{{ route('termini') }}" target="_blank"
                                class="text-gold text-decoration-underline">{{ __('ui.terms_link') }}</a>
                            {{ __('ui.terms_note') }}
                        </label>
                    </div>

                    <input type="hidden" name="payment_method" id="payment_method">
                    <button type="submit"
                        class="btn btn-gold w-100 rounded-pill">{{ __('ui.confirm_booking') }}</button>
                </form>

                {{-- Overlay di caricamento --}}
                <div id="loading-overlay"
                    class="d-none position-fixed top-0 start-0 w-100 h-100 bg-white bg-opacity-75 z-3 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <div class="spinner-border text-gold mb-3" style="width: 3rem; height: 3rem;" role="status">
                        </div>
                        <p class="text-muted">{{ __('ui.processing') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Script Stripe --}}
    {{-- @vite(['resources/js/booking.js']) --}}
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

            const cardHolderName = document.getElementById('card_holder_name').value.trim() ||
                `${document.getElementById('guest_first_name').value} ${document.getElementById('guest_last_name').value}`;

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
