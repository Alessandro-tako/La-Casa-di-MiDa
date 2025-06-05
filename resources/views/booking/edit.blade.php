<x-layout>
    <div class="container py-5">
        <h1 class="text-gold mb-4 text-center">Modifica Prenotazione</h1>

        {{-- Messaggio di successo --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Errori di validazione --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.prenotazioni.updateDate', $prenotazione) }}" method="POST" id="edit-form">
            @csrf
            @method('PUT')

            {{-- Nome completo (solo visualizzazione) --}}
            <div class="mb-3">
                <label for="guest_full_name" class="form-label">Nome completo</label>
                <input type="text" id="guest_full_name" class="form-control"
                    value="{{ $prenotazione->guest_first_name }} {{ $prenotazione->guest_last_name }}" disabled>
            </div>

            {{-- Camera --}}
            <div class="mb-3">
                <label for="room_name" class="form-label">Camera</label>
                <select name="room_name" id="room_name" class="form-select" required>
                    <option value="Green Room" {{ $prenotazione->room_name == 'Green Room' ? 'selected' : '' }}>Green
                        Room</option>
                    <option value="Pink Room" {{ $prenotazione->room_name == 'Pink Room' ? 'selected' : '' }}>Pink Room
                    </option>
                    <option value="Grey Room" {{ $prenotazione->room_name == 'Grey Room' ? 'selected' : '' }}>Grey Room
                    </option>
                </select>
            </div>

            {{-- Numero di ospiti --}}
            <div class="mb-3">
                <label for="guests" class="form-label">Numero di ospiti</label>
                <select name="guests" id="guests" class="form-select" required>
                    @for ($i = 1; $i <= 3; $i++)
                        <option value="{{ $i }}" {{ $prenotazione->guests == $i ? 'selected' : '' }}>
                            {{ $i }} {{ $i == 1 ? 'ospite' : 'ospiti' }}
                        </option>
                    @endfor
                </select>
            </div>

            {{-- Date --}}
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="check_in" class="form-label">Data di Check-in</label>
                    <input type="text" name="check_in" id="check_in" class="form-control"
                        value="{{ \Carbon\Carbon::parse($prenotazione->check_in)->format('d-m-Y') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="check_out" class="form-label">Data di Check-out</label>
                    <input type="text" name="check_out" id="check_out" class="form-control"
                        value="{{ \Carbon\Carbon::parse($prenotazione->check_out)->format('d-m-Y') }}" required>
                </div>
            </div>

            {{-- Prezzo totale --}}
            <div class="mb-3">
                <label class="form-label">Prezzo Totale</label>
                <div id="price_display" class="fs-5 fw-semibold">
                    Totale: <span class="text-gold">€ {{ number_format($prenotazione->price, 2, ',', '.') }}</span>
                </div>
            </div>

            {{-- Campo nascosto per salvare il prezzo aggiornato --}}
            <input type="hidden" name="price" id="price" value="{{ $prenotazione->price }}">

            <div class="d-flex align-items-center gap-2 mt-4">
                <button type="submit" class="btn btn-gold rounded-pill">Aggiorna Prenotazione</button>
                <a href="{{ route('admin.prenotazioni') }}" class="btn btn-secondary rounded-pill">Annulla</a>
            </div>
        </form>

        {{-- Flatpickr + logica ricalcolo --}}
        @vite(['resources/js/edit-booking.js'])
        <script>
            const booked = @json($bookedDates);
        </script>
    </div>
</x-layout>
