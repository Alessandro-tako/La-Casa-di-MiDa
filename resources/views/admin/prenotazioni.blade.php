<x-layout>
    @section('title', 'Gestione Prenotazioni - Admin | La Casa di MiDa')

    <div class="container py-5">
        <h1 class="text-gold mb-4 text-center">Gestione Prenotazioni</h1>

        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        {{-- barra di ricerca --}}
        <form method="GET" action="{{ route('admin.prenotazioni') }}" class="mb-4" role="search">
            <div class="row g-2 justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <label for="search" class="visually-hidden">Cerca prenotazione</label>
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control"
                            placeholder="Cerca per nome, email, camera..." value="{{ request('search') }}">
                        <button class="btn btn-gold" type="submit">
                            <i class="fas fa-search me-1"></i>
                            <span class="d-md-inline">Cerca</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        {{-- per mostrare l'archivio completo e non solo le vecchie di 2 mesi  --}}
        @if (!request()->boolean('show_all'))
            <div class="text-center mb-4">
                <a href="{{ route('admin.prenotazioni', array_merge(request()->all(), ['show_all' => 1])) }}"
                    class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-archive me-1"></i> Mostra archivio completo
                </a>
            </div>
        @else
            <div class="text-center mb-4">
                <a href="{{ route('admin.prenotazioni', array_merge(request()->except('show_all'))) }}"
                    class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-clock-history me-1"></i> Torna alla vista limitata
                </a>
            </div>
        @endif


        @if ($prenotazioni->isEmpty())
            <p class="text-center">Nessuna prenotazione disponibile al momento.</p>
        @else
            <!-- Vista Desktop/Tablet -->
            <div class="table-responsive d-none d-lg-block">
                <table class="table table-hover align-middle" aria-describedby="Lista prenotazioni">
                    <thead class="table-light">
                        <tr>
                            {{-- Colonna ID con ordinamento --}}
                            <th>
                                @php
                                    $sort = request('sort');
                                    $dir = $sort === 'id_asc' ? 'id_desc' : 'id_asc';
                                    $icon =
                                        $sort === 'id_asc'
                                            ? 'bi-caret-up-fill'
                                            : ($sort === 'id_desc'
                                                ? 'bi-caret-down-fill'
                                                : null);
                                @endphp
                                <a href="{{ route('admin.prenotazioni', array_merge(request()->all(), ['sort' => $dir])) }}"
                                    class="text-dark text-decoration-none">
                                    #
                                    @if ($icon)
                                        <i class="bi {{ $icon }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th>Cliente</th>
                            <th>Camera</th>
                            {{-- Colonna Date con ordinamento --}}
                            <th>
                                @php
                                    $dir = $sort === 'checkin_asc' ? 'checkin_desc' : 'checkin_asc';
                                    $icon =
                                        $sort === 'checkin_asc'
                                            ? 'bi-caret-up-fill'
                                            : ($sort === 'checkin_desc'
                                                ? 'bi-caret-down-fill'
                                                : null);
                                @endphp
                                <a href="{{ route('admin.prenotazioni', array_merge(request()->all(), ['sort' => $dir])) }}"
                                    class="text-dark text-decoration-none">
                                    Date
                                    @if ($icon)
                                        <i class="bi {{ $icon }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th>Ospiti</th>
                            <th>Stato</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($prenotazioni as $prenotazione)
                            @php
                                $checkin = \Carbon\Carbon::parse($prenotazione->check_in);
                                $checkout = \Carbon\Carbon::parse($prenotazione->check_out);
                                $status = $prenotazione->status;
                                $badgeClass = match ($status) {
                                    'confermata' => 'success',
                                    'annullata' => 'danger',
                                    default => 'warning',
                                };
                            @endphp

                            <tr>
                                <td>{{ $prenotazione->id }}</td>
                                <td>
                                    {{ $prenotazione->guest_first_name }} {{ $prenotazione->guest_last_name }}<br>
                                    <small>{{ $prenotazione->guest_email }}</small>
                                </td>
                                <td>{{ $prenotazione->room_name === 'Gray Room' ? 'Grey Room' : $prenotazione->room_name }}
                                </td>
                                <td>
                                    <strong>{{ $checkin->format('d/m/Y') }}</strong> →
                                    <strong>{{ $checkout->format('d/m/Y') }}</strong><br>
                                    @if ($prenotazione->soggiorno === 'in_corso')
                                        <span class="badge bg-info text-dark mt-1">Soggiorno in corso</span>
                                    @elseif ($prenotazione->soggiorno === 'concluso')
                                        <span class="badge bg-secondary mt-1">Soggiorno concluso</span>
                                    @elseif ($prenotazione->soggiorno === 'in_arrivo')
                                        <span class="badge bg-primary mt-1">In arrivo</span>
                                    @endif
                                </td>
                                <td>{{ $prenotazione->guests }}</td>
                                <td>
                                    <span class="badge bg-{{ $badgeClass }}" title="Stato: {{ ucfirst($status) }}">
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if ($status !== 'annullata')
                                        @if ($prenotazione->soggiorno === 'concluso')
                                            <span class="badge bg-secondary">Soggiorno concluso</span>
                                        @else
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-gold dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    aria-label="Azioni per prenotazione {{ $prenotazione->id }}">
                                                    Azioni
                                                </button>
                                                <ul class="dropdown-menu">
                                                    @if ($status === 'in_attesa')
                                                        <li>
                                                            <form
                                                                action="{{ route('admin.prenotazioni.update', $prenotazione) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf @method('PATCH')
                                                                <input type="hidden" name="action" value="conferma">
                                                                <button class="dropdown-item text-success"
                                                                    type="submit">
                                                                    <i class="fas fa-check me-2"></i>Conferma
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <a class="dropdown-item text-warning"
                                                            href="{{ route('admin.prenotazioni.edit', $prenotazione) }}">
                                                            <i class="fas fa-edit me-2"></i>Modifica
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <form
                                                            action="{{ route('admin.prenotazioni.update', $prenotazione) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('Sei sicuro di voler annullare questa prenotazione?');">
                                                            @csrf @method('PATCH')
                                                            <input type="hidden" name="action" value="annulla">
                                                            <button class="dropdown-item text-danger" type="submit">
                                                                <i class="fas fa-times me-2"></i>Annulla
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    @else
                                        @if (!$prenotazione->penale_addebitata && $prenotazione->stripe_customer_id && $prenotazione->stripe_payment_method)
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-dark dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                                    aria-label="Gestisci penale per prenotazione {{ $prenotazione->id }}">
                                                    Penale
                                                </button>
                                                <div class="dropdown-menu p-3" style="min-width: 250px;">
                                                    <form action="{{ route('admin.penale.addebita', $prenotazione) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Vuoi davvero addebitare una penale a questa prenotazione annullata?');">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="penale_{{ $prenotazione->id }}"
                                                                class="form-label fw-bold">
                                                                Seleziona penale:
                                                            </label>
                                                            <select name="penale_percentuale"
                                                                id="penale_{{ $prenotazione->id }}"
                                                                class="form-select form-select-sm" required>
                                                                <option disabled selected>Seleziona penale</option>
                                                                <option value="0">Nessuna penale</option>
                                                                <option value="50">Penale 50% (cancellazione
                                                                    tardiva)</option>
                                                                <option value="100">Penale 100% (no-show)</option>
                                                            </select>
                                                        </div>
                                                        <button class="btn btn-sm btn-outline-danger w-100"
                                                            type="submit">
                                                            <i class="fas fa-credit-card me-2"></i>Addebita penale
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        @elseif (!$prenotazione->stripe_customer_id || !$prenotazione->stripe_payment_method)
                                            <span class="badge bg-warning text-dark">Carta non disponibile</span>
                                        @else
                                            <div class="dropdown d-inline-block">
                                                <button class="badge bg-dark border-0 dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    style="cursor: pointer;">
                                                    <i class="bi bi-check-circle me-1"></i> Penale applicata
                                                </button>
                                                <ul class="dropdown-menu">
                                                    @if ($prenotazione->penale_pdf_path)
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center"
                                                                href="{{ route('admin.penale.scarica', $prenotazione) }}"
                                                                target="_blank">
                                                                <i
                                                                    class="bi bi-file-earmark-pdf-fill me-2 text-danger"></i>
                                                                Scarica ricevuta PDF
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <span class="dropdown-item text-muted">PDF non
                                                                disponibile</span>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- Vista Mobile (Cards) --}}
            <div class="d-lg-none">
                <div class="d-lg-none mb-3 text-center">
                    <form method="GET" action="{{ route('admin.prenotazioni') }}">
                        <select name="sort" class="form-select w-auto d-inline" onchange="this.form.submit()">
                            <option value="">Ordina per...</option>
                            <option value="id_asc" {{ request('sort') === 'id_asc' ? 'selected' : '' }}>ID crescente
                            </option>
                            <option value="id_desc" {{ request('sort') === 'id_desc' ? 'selected' : '' }}>ID
                                decrescente</option>
                            <option value="checkin_asc" {{ request('sort') === 'checkin_asc' ? 'selected' : '' }}>Data
                                arrivo ↑</option>
                            <option value="checkin_desc" {{ request('sort') === 'checkin_desc' ? 'selected' : '' }}>
                                Data arrivo ↓</option>
                            <option value="room_asc" {{ request('sort') === 'room_asc' ? 'selected' : '' }}>Camera A-Z
                            </option>
                            <option value="room_desc" {{ request('sort') === 'room_desc' ? 'selected' : '' }}>Camera
                                Z-A</option>
                            <option value="guests_asc" {{ request('sort') === 'guests_asc' ? 'selected' : '' }}>Ospiti
                                ↑</option>
                            <option value="guests_desc" {{ request('sort') === 'guests_desc' ? 'selected' : '' }}>
                                Ospiti ↓</option>
                            <option value="status_asc" {{ request('sort') === 'status_asc' ? 'selected' : '' }}>Stato
                                A-Z</option>
                            <option value="status_desc" {{ request('sort') === 'status_desc' ? 'selected' : '' }}>
                                Stato Z-A</option>
                        </select>
                    </form>
                </div>

                @foreach ($prenotazioni as $prenotazione)
                    @php
                        $checkin = \Carbon\Carbon::parse($prenotazione->check_in);
                        $checkout = \Carbon\Carbon::parse($prenotazione->check_out);
                        $status = $prenotazione->status;
                        $badgeClass = match ($status) {
                            'confermata' => 'success',
                            'annullata' => 'danger',
                            default => 'warning',
                        };
                    @endphp

                    <div class="card mb-3 shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center bg-light">
                            <h6 class="mb-0 fw-bold text-gold">Prenotazione #{{ $prenotazione->id }}</h6>
                            <span class="badge bg-{{ $badgeClass }}">{{ ucfirst($status) }}</span>
                        </div>
                        <div class="card-body">
                            {{-- Cliente --}}
                            <div class="mb-2">
                                <strong class="text-muted d-block small">CLIENTE</strong>
                                {{ $prenotazione->guest_first_name }} {{ $prenotazione->guest_last_name }}<br>
                                <small class="text-muted">{{ $prenotazione->guest_email }}</small>
                            </div>

                            {{-- Camera & Ospiti --}}
                            <div class="mb-2">
                                <strong class="text-muted d-block small">CAMERA</strong>
                                {{ $prenotazione->room_name === 'Gray Room' ? 'Grey Room' : $prenotazione->room_name }}
                                <br>
                                <strong class="text-muted d-block small mt-2">OSPITI</strong>
                                {{ $prenotazione->guests }}
                            </div>

                            {{-- Date --}}
                            <div class="mb-2">
                                <strong class="text-muted d-block small">PERIODO</strong>
                                <span><strong>{{ $checkin->format('d/m/Y') }}</strong> →
                                    <strong>{{ $checkout->format('d/m/Y') }}</strong></span><br>
                                @if ($prenotazione->soggiorno === 'in_corso')
                                    <span class="badge bg-info text-dark mt-1">Soggiorno in corso</span>
                                @elseif ($prenotazione->soggiorno === 'concluso')
                                    <span class="badge bg-secondary mt-1">Soggiorno concluso</span>
                                @elseif ($prenotazione->soggiorno === 'in_arrivo')
                                    <span class="badge bg-primary mt-1">In arrivo</span>
                                @endif
                            </div>

                            {{-- Azioni --}}
                            <div class="mt-3">
                                @if ($status !== 'annullata')
                                    @if ($prenotazione->soggiorno === 'concluso')
                                        <span class="badge bg-secondary">Soggiorno concluso</span>
                                    @else
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-gold dropdown-toggle w-100" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Azioni
                                            </button>
                                            <ul class="dropdown-menu w-100">
                                                @if ($status === 'in_attesa')
                                                    <li>
                                                        <form
                                                            action="{{ route('admin.prenotazioni.update', $prenotazione) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf @method('PATCH')
                                                            <input type="hidden" name="action" value="conferma">
                                                            <button class="dropdown-item text-success" type="submit">
                                                                <i class="fas fa-check me-2"></i>Conferma
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                @endif
                                                <li>
                                                    <a class="dropdown-item text-warning"
                                                        href="{{ route('admin.prenotazioni.edit', $prenotazione) }}">
                                                        <i class="fas fa-edit me-2"></i>Modifica
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <form
                                                        action="{{ route('admin.prenotazioni.update', $prenotazione) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Sei sicuro di voler annullare questa prenotazione?');">
                                                        @csrf @method('PATCH')
                                                        <input type="hidden" name="action" value="annulla">
                                                        <button class="dropdown-item text-danger" type="submit">
                                                            <i class="fas fa-times me-2"></i>Annulla
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                @else
                                    @if (!$prenotazione->penale_addebitata && $prenotazione->stripe_customer_id && $prenotazione->stripe_payment_method)
                                        <div class="dropdown mt-3">
                                            <button class="btn btn-sm btn-outline-dark dropdown-toggle w-100"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#penale-{{ $prenotazione->id }}"
                                                aria-expanded="false">
                                                Penale
                                            </button>
                                        </div>
                                        <div class="collapse mt-2" id="penale-{{ $prenotazione->id }}">
                                            <div class="card card-body bg-light">
                                                <form action="{{ route('admin.penale.addebita', $prenotazione) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Vuoi davvero addebitare una penale a questa prenotazione annullata?');">
                                                    @csrf
                                                    <div class="mb-2">
                                                        <label for="penale_mobile_{{ $prenotazione->id }}"
                                                            class="form-label fw-bold small">
                                                            Seleziona penale:
                                                        </label>
                                                        <select name="penale_percentuale"
                                                            id="penale_mobile_{{ $prenotazione->id }}"
                                                            class="form-select form-select-sm" required>
                                                            <option disabled selected>Seleziona penale</option>
                                                            <option value="0">Nessuna penale</option>
                                                            <option value="50">Penale 50% (cancellazione tardiva)
                                                            </option>
                                                            <option value="100">Penale 100% (no-show)</option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-sm btn-outline-danger w-100"
                                                        type="submit">
                                                        <i class="fas fa-credit-card me-2"></i>Addebita penale
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @elseif (!$prenotazione->stripe_customer_id || !$prenotazione->stripe_payment_method)
                                        <span class="badge bg-warning text-dark mt-2">Carta non disponibile</span>
                                    @else
                                        <span class="badge bg-dark mt-2">
                                            <i class="bi bi-check-circle me-1"></i> Penale applicata
                                        </span>
                                        @if ($prenotazione->penale_pdf_path)
                                            <a href="{{ route('admin.penale.scarica', $prenotazione) }}"
                                                class="btn btn-sm btn-outline-secondary mt-2" target="_blank">
                                                <i class="bi bi-file-earmark-pdf me-1"></i> Ricevuta
                                            </a>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Paginazione --}}
            @if ($prenotazioni->hasPages())
                <nav class="mt-5 d-flex justify-content-center" aria-label="Navigazione paginazione prenotazioni">
                    <ul class="pagination pagination-sm">
                        @if ($prenotazioni->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                        @else
                            <li class="page-item">
                                <a class="page-link text-gold" href="{{ $prenotazioni->previousPageUrl() }}"
                                    rel="prev" aria-label="Pagina precedente">&laquo;</a>
                            </li>
                        @endif

                        @foreach ($prenotazioni->getUrlRange(1, $prenotazioni->lastPage()) as $page => $url)
                            @if ($page == $prenotazioni->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link bg-gold border-gold text-white">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item"><a class="page-link text-gold"
                                        href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        @if ($prenotazioni->hasMorePages())
                            <li class="page-item"><a class="page-link text-gold"
                                    href="{{ $prenotazioni->nextPageUrl() }}" rel="next"
                                    aria-label="Pagina successiva">&raquo;</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                        @endif
                    </ul>
                </nav>
            @endif
        @endif
    </div>
</x-layout>
