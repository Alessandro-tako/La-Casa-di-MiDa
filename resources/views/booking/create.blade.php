<x-layout>
    @section('title', 'Gestione Prenotazioni - Admin | La Casa di MiDa')

    <div class="container py-5">
        <h1 class="text-gold mb-4 text-center">Gestione Prenotazioni</h1>

        {{-- Messaggio successo --}}
        @if (session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        {{-- Ricerca --}}
        <form method="GET" action="{{ route('admin.prenotazioni') }}" class="mb-4 d-flex justify-content-center"
            role="search">
            <label for="search" class="visually-hidden">Cerca prenotazione</label>
            <input type="text" name="search" id="search" class="form-control w-50 me-2"
                placeholder="Cerca per nome, email, camera..." value="{{ request('search') }}">
            <button class="btn btn-outline-dark" type="submit">Cerca</button>
        </form>

        @if ($prenotazioni->isEmpty())
            <p class="text-center">Nessuna prenotazione disponibile al momento.</p>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle" aria-describedby="Lista prenotazioni">
                    <thead class="table-light">
                        <tr>
                            <th>
                                <a
                                    href="{{ route('admin.prenotazioni', array_merge(request()->only('search'), ['sort' => request('sort') === 'id_asc' ? 'id_desc' : 'id_asc'])) }}">
                                    #
                                    @if (request('sort') === 'id_asc')
                                        ▲
                                    @elseif (request('sort') === 'id_desc')
                                        ▼
                                    @endif
                                </a>
                            </th>
                            <th>Cliente</th>
                            <th>Camera</th>
                            <th>
                                <a
                                    href="{{ route('admin.prenotazioni', array_merge(request()->only('search'), ['sort' => request('sort') === 'checkin_asc' ? 'checkin_desc' : 'checkin_asc'])) }}">
                                    Date
                                    @if (request('sort') === 'checkin_asc')
                                        ▲
                                    @elseif (request('sort') === 'checkin_desc')
                                        ▼
                                    @endif
                                </a>
                            </th>
                            <th>Ospiti</th>
                            <th>Stato</th>
                            <th class="text-center">Azioni</th>
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
                                    <div class="d-flex flex-wrap justify-content-center gap-1">
                                        @if ($status !== 'annullata')
                                            @if ($prenotazione->soggiorno === 'concluso')
                                                <span class="badge bg-secondary">Soggiorno concluso</span>
                                            @else
                                                @if ($status === 'in_attesa')
                                                    <form
                                                        action="{{ route('admin.prenotazioni.update', $prenotazione) }}"
                                                        method="POST">
                                                        @csrf @method('PATCH')
                                                        <input type="hidden" name="action" value="conferma">
                                                        <button class="btn btn-sm btn-success"
                                                            aria-label="Conferma prenotazione">Conferma</button>
                                                    </form>
                                                @endif

                                                <a href="{{ route('admin.prenotazioni.edit', $prenotazione) }}"
                                                    class="btn btn-sm btn-warning"
                                                    aria-label="Modifica prenotazione">Modifica</a>

                                                <form action="{{ route('admin.prenotazioni.update', $prenotazione) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Sei sicuro di voler annullare questa prenotazione?');">
                                                    @csrf @method('PATCH')
                                                    <input type="hidden" name="action" value="annulla">
                                                    <button class="btn btn-sm btn-danger"
                                                        aria-label="Annulla prenotazione">Annulla</button>
                                                </form>
                                            @endif
                                        @else
                                            @if (!$prenotazione->penale_addebitata && $prenotazione->stripe_customer_id && $prenotazione->stripe_payment_method)
                                                <form action="{{ route('admin.penale.addebita', $prenotazione) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Vuoi davvero addebitare una penale a questa prenotazione annullata?');">
                                                    @csrf
                                                    <div class="d-flex flex-column align-items-center">
                                                        <select name="guest_address_country" id="guest_address_country"
                                                            class="form-select" required>
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
                                                        <button class="btn btn-sm btn-outline-dark"
                                                            aria-label="Addebita penale">Addebita penale</button>
                                                    </div>
                                                </form>
                                            @elseif (!$prenotazione->stripe_customer_id || !$prenotazione->stripe_payment_method)
                                                <span class="badge bg-warning text-dark">Carta non disponibile</span>
                                            @else
                                                <span class="badge bg-dark">Penale applicata</span>
                                            @endif
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Paginazione --}}
            @if ($prenotazioni->hasPages())
                <nav class="mt-5 d-flex justify-content-center" aria-label="Navigazione paginazione prenotazioni">
                    <ul class="pagination pagination-sm">
                        {{-- Link pagina precedente --}}
                        @if ($prenotazioni->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                        @else
                            <li class="page-item">
                                <a class="page-link text-gold" href="{{ $prenotazioni->previousPageUrl() }}"
                                    rel="prev" aria-label="Pagina precedente">&laquo;</a>
                            </li>
                        @endif

                        {{-- Numeri di pagina --}}
                        @foreach ($prenotazioni->getUrlRange(1, $prenotazioni->lastPage()) as $page => $url)
                            @if ($page == $prenotazioni->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link bg-gold border-gold text-white">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link text-gold"
                                        href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Link pagina successiva --}}
                        @if ($prenotazioni->hasMorePages())
                            <li class="page-item">
                                <a class="page-link text-gold" href="{{ $prenotazioni->nextPageUrl() }}"
                                    rel="next" aria-label="Pagina successiva">&raquo;</a>
                            </li>
                        @else
                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                        @endif
                    </ul>
                </nav>
            @endif
        @endif
    </div>
</x-layout>
