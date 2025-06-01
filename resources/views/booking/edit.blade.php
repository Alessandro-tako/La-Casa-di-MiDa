<x-layout>
    <div class="container py-5">
        <h2 class="text-gold mb-4 text-center">Modifica Prenotazione</h2>

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

        <form action="{{ route('admin.prenotazioni.updateDate', $prenotazione) }}" method="POST" id="edit-form">
            @csrf
            @method('PUT')

            {{-- Nome --}}
            <div class="mb-3">
                <label class="form-label">Nome completo</label>
                <input type="text" class="form-control" value="{{ $prenotazione->guest_first_name }} {{ $prenotazione->guest_last_name }}" disabled>
            </div>

            {{-- Camera --}}
            <div class="mb-3">
                <label for="room_name" class="form-label">Camera</label>
                <select name="room_name" id="room_name" class="form-select" required>
                    <option value="Green Room" {{ $prenotazione->room_name == 'Green Room' ? 'selected' : '' }}>Green Room</option>
                    <option value="Pink Room" {{ $prenotazione->room_name == 'Pink Room' ? 'selected' : '' }}>Pink Room</option>
                    <option value="Gray Room" {{ $prenotazione->room_name == 'Gray Room' ? 'selected' : '' }}>Gray Room</option>
                </select>
            </div>

            {{-- Ospiti --}}
            <div class="mb-3">
                <label for="guests" class="form-label">Numero di ospiti</label>
                <select name="guests" id="guests" class="form-select" required>
                    <option value="1" {{ $prenotazione->guests == 1 ? 'selected' : '' }}>1 ospite</option>
                    <option value="2" {{ $prenotazione->guests == 2 ? 'selected' : '' }}>2 ospiti</option>
                    <option value="3" {{ $prenotazione->guests == 3 ? 'selected' : '' }}>3 ospiti</option>
                </select>
            </div>

            {{-- Date --}}
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="check_in" class="form-label">Check-in</label>
                    <input type="text" name="check_in" id="check_in" class="form-control"
                        value="{{ \Carbon\Carbon::parse($prenotazione->check_in)->format('d-m-Y') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="check_out" class="form-label">Check-out</label>
                    <input type="text" name="check_out" id="check_out" class="form-control"
                        value="{{ \Carbon\Carbon::parse($prenotazione->check_out)->format('d-m-Y') }}" required>
                </div>
            </div>

            {{-- Prezzo aggiornato --}}
            <div class="mb-3">
                <label class="form-label">Prezzo Totale</label>
                <div id="price_display" class="fs-5 fw-semibold">
                    Totale: <span class="text-gold">€{{ number_format($prenotazione->price, 2, ',', '.') }}</span>
                </div>
            </div>

            {{-- Hidden per aggiornare anche il prezzo --}}
            <input type="hidden" name="price" id="price" value="{{ $prenotazione->price }}">

            <button type="submit" class="btn btn-gold">Aggiorna Prenotazione</button>
            <a href="{{ route('admin.prenotazioni') }}" class="btn btn-secondary ms-2">Annulla</a>
        </form>

        {{-- Script Flatpickr + logica ricalcolo --}}
        @vite(['resources/js/edit-booking.js'])
        <script>
            const booked = @json($bookedDates);
        </script>
    </div>
</x-layout>
