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
            <div class="row align-items-center mb-4 gy-2">
                {{-- Titolo --}}
                <div class="col-12 col-md-4">
                    <h2 id="calendario-title" class="text-gold mb-0">Calendario Prenotazioni</h2>
                </div>

                {{-- Select filtraggio --}}
                <div class="col-12 col-md-4">
                    <label for="filtro-camera" class="visually-hidden">Filtra per camera</label>
                    <div class="d-flex justify-content-md-center">
                        <select id="filtro-camera" class="form-select form-select-sm w-100 w-md-auto"
                            aria-label="Filtra per camera">
                            <option value="">Tutte le camere</option>
                            <option value="Pink Room">Pink Room</option>
                            <option value="Green Room">Green Room</option>
                            <option value="Grey Room">Grey Room</option>
                        </select>
                    </div>
                </div>

                {{-- Dropdown link ICS --}}
                <div class="col-12 col-md-4">
                    <div class="d-flex justify-content-md-end">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                id="icsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-link-45deg me-1"></i> Link .ICS
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm p-3" style="min-width: 300px;"
                                aria-labelledby="icsDropdown">
                                @foreach (['Pink Room', 'Green Room', 'Grey Room'] as $room)
                                    <li class="mb-2">
                                        <label class="form-label small fw-semibold">{{ $room }}</label>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" readonly
                                                value="{{ url('/ics-export/' . urlencode($room)) }}"
                                                id="link-{{ Str::slug($room) }}">
                                            <button class="btn btn-outline-secondary" type="button"
                                                onclick="navigator.clipboard.writeText(document.getElementById('link-{{ Str::slug($room) }}').value)">
                                                <i class="bi bi-clipboard"></i>
                                            </button>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
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
                            html: `<div class="fw-semibold text-white room-line"></div>`
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
