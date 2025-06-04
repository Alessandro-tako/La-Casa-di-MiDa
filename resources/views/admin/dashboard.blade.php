<x-layout>
    @section('title', 'Dashboard Amministratore | La Casa di MiDa')

    <div class="container py-5">
        <h1 class="text-gold mb-4">Dashboard Amministratore</h1>

        {{-- STATISTICHE PRENOTAZIONI --}}
        <section aria-labelledby="statistiche">
            <h2 id="statistiche" class="visually-hidden">Statistiche prenotazioni</h2>
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card text-center shadow-sm border-0">
                        <div class="card-body">
                            <h3 class="card-title fs-6">Totali</h3>
                            <p class="display-6">{{ $totali['tutte'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center shadow-sm border-0">
                        <div class="card-body">
                            <h3 class="card-title fs-6">In attesa</h3>
                            <p class="display-6 text-warning">{{ $totali['in_attesa'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center shadow-sm border-0">
                        <div class="card-body">
                            <h3 class="card-title fs-6">Confermate</h3>
                            <p class="display-6 text-success">{{ $totali['confermate'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center shadow-sm border-0">
                        <div class="card-body">
                            <h3 class="card-title fs-6">Annullate</h3>
                            <p class="display-6 text-danger">{{ $totali['annullate'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- CALENDARIO PRENOTAZIONI --}}
        <section class="my-5" aria-labelledby="calendario-title">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 id="calendario-title" class="text-gold">Calendario Prenotazioni</h2>
                <label for="filtro-camera" class="visually-hidden">Filtra per camera</label>
                <select id="filtro-camera" class="form-select w-auto" aria-label="Filtra per camera">
                    <option value="">Tutte le camere</option>
                    <option value="Pink Room">Pink Room</option>
                    <option value="Green Room">Green Room</option>
                    <option value="Grey Room">Grey Room</option>
                </select>
            </div>
            <div id="calendar" aria-describedby="LegendaCalendario"></div>
        </section>

        {{-- LEGENDA COLORI --}}
        <section class="mb-5" id="LegendaCalendario" aria-label="Legenda camere">
            <h2 class="visually-hidden">Legenda colori camere</h2>
            <div class="d-flex gap-3 align-items-center small">
                <span><span class="badge" style="background:#e83e8c;">&nbsp;</span> Pink Room</span>
                <span><span class="badge" style="background:#28a745;">&nbsp;</span> Green Room</span>
                <span><span class="badge" style="background:#6c757d;">&nbsp;</span> Grey Room</span>
            </div>
        </section>

        {{-- LINK GESTIONE --}}
        <div class="mt-4 text-end">
            <a href="{{ route('admin.prenotazioni') }}" class="btn btn-gold rounded-pill"
                aria-label="Vai alla gestione prenotazioni">Vai a gestione prenotazioni</a>
        </div>
    </div>

    {{-- FULLCALENDAR --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const calendarEl = document.getElementById('calendar');
                const allEvents = @json($prenotazioni);

                const calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'it',
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
                            html: `<div class="fw-semibold text-white">${arg.event.title}</div>`
                        };
                    }
                });

                calendar.render();

                // Filtro camere
                document.getElementById('filtro-camera').addEventListener('change', function() {
                    const filtro = this.value;
                    calendar.removeAllEvents();
                    const filtrati = filtro === '' ? allEvents : allEvents.filter(e => e.title === filtro);
                    calendar.addEventSource(filtrati);
                });
            });
        </script>
    @endpush
</x-layout>
