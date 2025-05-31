<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8">
                <h2 class="text-gold mb-4 text-center">Prenota la tua camera</h2>

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

                    {{-- Indirizzo di residenza --}}
                    <div class="mb-3">
                        <label for="guest_address_street" class="form-label">Via</label>
                        <input type="text" name="guest_address_street" id="guest_address_street" class="form-control"
                            required>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="guest_address_city" class="form-label">Città</label>
                            <input type="text" name="guest_address_city" id="guest_address_city" class="form-control"
                                required>
                        </div>
                        <div class="col-md-3">
                            <label for="guest_address_zip" class="form-label">CAP</label>
                            <input type="text" name="guest_address_zip" id="guest_address_zip" class="form-control"
                                required>
                        </div>
                        <div class="col-md-3">
                            <label for="guest_address_country" class="form-label">Paese</label>
                            <select name="guest_address_country" id="guest_address_country" class="form-select"
                                required>
                                <option value="">Seleziona il paese</option>
                                <option value="AF">افغانستان</option>
                                <option value="AL">Shqipëri</option>
                                <option value="DZ">الجزائر</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Հայաստան</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Österreich</option>
                                <option value="AZ">Azərbaycan</option>
                                <option value="BH">البحرين</option>
                                <option value="BD">বাংলাদেশ</option>
                                <option value="BY">Беларусь</option>
                                <option value="BE">België / Belgique</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Bénin</option>
                                <option value="BT">འབྲུག་</option>
                                <option value="BO">Bolivia</option>
                                <option value="BA">Bosna i Hercegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BR">Brasil</option>
                                <option value="BN">Brunei Darussalam</option>
                                <option value="BG">България</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="KH">កម្ពុជា</option>
                                <option value="CM">Cameroun</option>
                                <option value="CA">Canada</option>
                                <option value="CV">Cabo Verde</option>
                                <option value="CF">République Centrafricaine</option>
                                <option value="TD">Tchad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">中国</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">جزر القمر</option>
                                <option value="CD">République Démocratique du Congo</option>
                                <option value="CG">République du Congo</option>
                                <option value="CR">Costa Rica</option>
                                <option value="HR">Hrvatska</option>
                                <option value="CU">Cuba</option>
                                <option value="CY">Κύπρος</option>
                                <option value="CZ">Česko</option>
                                <option value="DK">Danmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DO">República Dominicana</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">مصر</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Guinea Ecuatorial</option>
                                <option value="EE">Eesti</option>
                                <option value="ET">ኢትዮጵያ</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Suomi</option>
                                <option value="FR">France</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">საქართველო</option>
                                <option value="DE">Deutschland</option>
                                <option value="GH">Ghana</option>
                                <option value="GR">Ελλάδα</option>
                                <option value="GT">Guatemala</option>
                                <option value="GN">Guinée</option>
                                <option value="GW">Guiné-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Ayiti</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">香港</option>
                                <option value="HU">Magyarország</option>
                                <option value="IS">Ísland</option>
                                <option value="IN">भारत</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">ایران</option>
                                <option value="IQ">العراق</option>
                                <option value="IE">Éire</option>
                                <option value="IL">ישראל</option>
                                <option value="IT">Italia</option>
                                <option value="JP">日本</option>
                                <option value="KR">대한민국</option>
                                <option value="RU">Россия</option>
                                <option value="ES">España</option>
                                <option value="US">United States</option>
                                <option value="GB">United Kingdom</option>
                                <!-- puoi aggiungere altri paesi se vuoi -->
                            </select>

                        </div>
                    </div>

                    {{-- Selezione Camera --}}
                    <div class="mb-3">
                        <label for="room_name" class="form-label">Camera</label>
                        <select name="room_name" id="room_name" class="form-select" required>
                            <option value="Green Room"
                                {{ old('room_name', $selectedRoom ?? '') == 'Green Room' ? 'selected' : '' }}>Green Room
                            </option>
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
                        <label for="guests" class="form-label">Numero di ospiti</label>
                        <select name="guests" id="guests" class="form-select" required>
                            <option value="">Seleziona</option>
                            <option value="1">1 ospite</option>
                            <option value="2">2 ospiti</option>
                            <option value="3">3 ospiti</option>
                        </select>
                    </div>

                    {{-- Date --}}
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="check_in" class="form-label">Check-in</label>
                            <input type="text" name="check_in" id="check_in" class="form-control" required
                                disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="check_out" class="form-label">Check-out</label>
                            <input type="text" name="check_out" id="check_out" class="form-control" required
                                disabled>
                        </div>
                    </div>

                    {{-- dati carta di credito --}}
                    <div class="mb-3">
                        <label for="card_holder_name" class="form-label">
                            Nome del titolare della carta <small class="text-muted">(se diverso dall'intestatario della
                                prenotazione)</small>
                        </label>
                        <input type="text" id="card_holder_name" class="form-control"
                            placeholder="Nome e Cognome">
                        <small class="form-text text-muted">
                            Inserisci il nome esatto riportato sulla carta se stai usando una carta non intestata a te.
                        </small>
                    </div>


                    <div class="mb-4">
                        <label for="card-element" class="form-label">Dati della carta di credito</label>
                        <div id="card-element" class="form-control p-3 rounded" style="height:auto;"></div>
                        <div id="card-errors" class="text-danger mt-2"></div>
                        <small class="text-muted">La carta non verrà addebitata ora. In caso di no-show o cancellazione
                            tardiva saranno applicate le penali previste.</small>
                    </div>

                    {{-- Prezzo Totale --}}
                    <div class="mb-3">
                        <label class="form-label">Prezzo Totale</label>
                        <div id="price_display" class="fs-5 fw-semibold">
                            Totale: <span class="text-gold">—</span>
                        </div>
                    </div>
                    {{-- accettazione clausole --}}
                    <div class="form-check mt-4">
                        <input class="form-check-input @error('accetta_condizioni') is-invalid @enderror"
                            type="checkbox" id="accetta_condizioni" name="accetta_condizioni" value="1"
                            required>

                        <label class="form-check-label" for="accetta_condizioni">
                            Dichiaro di aver letto e accettato le
                            <a href="{{ route('termini') }}" target="_blank"
                                class="text-gold text-decoration-underline">
                                condizioni di prenotazione
                            </a>
                            comprese le politiche di cancellazione e utilizzo della carta di credito.
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
                            <p class="text-muted">Stiamo processando la prenotazione, attendi...</p>
                        </div>
                    </div>
                    <input type="hidden" name="payment_method" id="payment_method">

                    <button type="submit" class="btn btn-gold rounded-pill w-100">Conferma Prenotazione</button>
                </form>

                <div class="mt-5 p-4 border rounded bg-light">
                    <h5 class="text-gold">Condizioni di prenotazione</h5>
                    <ul class="text-muted mb-0">
                        <li>Il pagamento verrà effettuato in struttura salvo diverse indicazioni.</li>
                        <li>All’arrivo dovranno essere versati anche <strong>2€ a notte a persona</strong> per la tassa
                            di soggiorno.</li>
                        <li>In caso di cancellazione entro 5 giorni dall’arrivo, verrà addebitato il 20% del totale.
                        </li>
                        <li>In caso di no-show (assenza senza cancellazione), verrà addebitato il 100% dell’importo.
                        </li>
                        <li>Check-in dalle 14:00 alle 22:00, check-out entro le 10:00.</li>
                        <li>I dati personali saranno trattati nel rispetto della normativa sulla privacy.</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    {{-- Flatpickr + logica --}}
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
            const cardHolderName = cardHolderInput.value.trim() !== '' ?
                cardHolderInput.value.trim() :
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
