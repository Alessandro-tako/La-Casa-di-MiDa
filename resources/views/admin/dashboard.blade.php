<x-layout>
    <div class="container py-5">
        <h2 class="text-gold mb-4">Dashboard Amministratore</h2>

        {{-- STATISTICHE --}}
        <div class="row g-3">
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Totali</h5>
                        <p class="display-6">{{ $totali['tutte'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">In attesa</h5>
                        <p class="display-6 text-warning">{{ $totali['in_attesa'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Confermate</h5>
                        <p class="display-6 text-success">{{ $totali['confermate'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Annullate</h5>
                        <p class="display-6 text-danger">{{ $totali['annullate'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- CALENDARIO --}}
        <div class="my-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-gold">Calendario Prenotazioni</h4>
                <select id="filtro-camera" class="form-select w-auto">
                    <option value="">Tutte le camere</option>
                    <option value="Pink Room">Pink Room</option>
                    <option value="Green Room">Green Room</option>
                    <option value="Gray Room">Gray Room</option>
                </select>
            </div>
            <div id="calendar"></div>
        </div>

        {{-- LEGENDA COLORI --}}
        <div class="mb-5">
            <div class="d-flex gap-3 align-items-center small">
                <span><span class="badge" style="background:#e83e8c;">&nbsp;</span> Pink Room</span>
                <span><span class="badge" style="background:#28a745;">&nbsp;</span> Green Room</span>
                <span><span class="badge" style="background:#6c757d;">&nbsp;</span> Gray Room</span>
            </div>
        </div>

        {{-- LINK A GESTIONE PRENOTAZIONI --}}
        <div class="mt-4 text-end">
            <a href="{{ route('admin.prenotazioni') }}" class="btn btn-gold rounded-pill">Vai a gestione
                prenotazioni</a>
        </div>
    </div>

    {{-- FULLCALENDAR SCRIPT --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let calendarEl = document.getElementById('calendar');
                let allEvents = @json($prenotazioni);
                let calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'it', // italiano
                    initialView: 'dayGridMonth',
                    height: 'auto',
                    eventDisplay: 'block',
                    events: allEvents,
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: ''
                    },
                    eventContent: function(arg) {
                        return {
                            html: `<div class="fw-semibold text-white room-line"></div>`
                        };
                    }
                });

                calendar.render();

                // Filtro per camera
                document.getElementById('filtro-camera').addEventListener('change', function() {
                    let filtro = this.value;
                    calendar.removeAllEvents();
                    if (filtro === '') {
                        calendar.addEventSource(allEvents);
                    } else {
                        calendar.addEventSource(allEvents.filter(e => e.title === filtro));
                    }
                });
            });
        </script>
    @endpush
</x-layout>
