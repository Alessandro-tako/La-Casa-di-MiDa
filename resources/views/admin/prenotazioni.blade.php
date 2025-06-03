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

        {{-- Elenco prenotazioni --}}
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
                                $oggi = now();
                                $checkin = \Carbon\Carbon::parse($prenotazione->check_in);
                                $checkout = \Carbon\Carbon::parse($prenotazione->check_out);
                                $status = $prenotazione->status;
                                $badgeClass = match ($status) {
                                    'confermata' => 'success',
                                    'annullata' => 'danger',
                                    default => 'warning',
                                };
                                $soggiorno = match (true) {
                                    $status !== 'confermata' => null,
                                    $oggi->between($checkin, $checkout->copy()->subDay()) => 'in_corso',
                                    $oggi->gt($checkout) => 'concluso',
                                    $oggi->lt($checkin) => 'in_arrivo',
                                };
                            @endphp

                            <tr>
                                <td>{{ $prenotazione->id }}</td>
                                <td>
                                    {{ $prenotazione->guest_first_name }} {{ $prenotazione->guest_last_name }}<br>
                                    <small>{{ $prenotazione->guest_email }}</small>
                                </td>
                                <td>{{ $prenotazione->room_name }}</td>
                                <td>
                                    <strong>{{ $checkin->format('d/m/Y') }}</strong> →
                                    <strong>{{ $checkout->format('d/m/Y') }}</strong><br>
                                    @if ($soggiorno === 'in_corso')
                                        <span class="badge bg-info text-dark mt-1">Soggiorno in corso</span>
                                    @elseif ($soggiorno === 'concluso')
                                        <span class="badge bg-secondary mt-1">Soggiorno concluso</span>
                                    @elseif ($soggiorno === 'in_arrivo')
                                        <span class="badge bg-primary mt-1">In arrivo</span>
                                    @endif
                                </td>
                                <td>{{ $prenotazione->guests }}</td>
                                <td>
                                    <span class="badge bg-{{ $badgeClass }}">{{ ucfirst($status) }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex flex-wrap justify-content-center gap-1">
                                        {{-- Azioni principali --}}
                                        @if ($status !== 'annullata')
                                            @if ($soggiorno === 'concluso')
                                                <span class="badge bg-secondary">Soggiorno concluso</span>
                                            @else
                                                @if ($status === 'in_attesa')
                                                    <form
                                                        action="{{ route('admin.prenotazioni.update', $prenotazione) }}"
                                                        method="POST">
                                                        @csrf @method('PATCH')
                                                        <input type="hidden" name="action" value="conferma">
                                                        <button class="btn btn-sm btn-success">Conferma</button>
                                                    </form>
                                                @endif

                                                <a href="{{ route('admin.prenotazioni.edit', $prenotazione) }}"
                                                    class="btn btn-sm btn-warning">Modifica</a>

                                                <form action="{{ route('admin.prenotazioni.update', $prenotazione) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Sei sicuro di voler annullare questa prenotazione?');">
                                                    @csrf @method('PATCH')
                                                    <input type="hidden" name="action" value="annulla">
                                                    <button class="btn btn-sm btn-danger">Annulla</button>
                                                </form>
                                            @endif
                                        @else
                                            {{-- Penale --}}
                                            @if (!$prenotazione->penale_addebitata && $prenotazione->stripe_customer_id && $prenotazione->stripe_payment_method)
                                                <form action="{{ route('admin.penale.addebita', $prenotazione) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Vuoi davvero addebitare una penale a questa prenotazione annullata?');">
                                                    @csrf
                                                    <div class="d-flex flex-column align-items-center">
                                                        <select name="penale_percentuale"
                                                            class="form-select form-select-sm mb-1" required>
                                                            <option value="" disabled selected>Seleziona penale
                                                            </option>
                                                            <option value="0">Nessuna penale</option>
                                                            <option value="20">Penale 20% (cancellazione tardiva)
                                                            </option>
                                                            <option value="100">Penale 100% (no-show)</option>
                                                        </select>
                                                        <button class="btn btn-sm btn-outline-dark">Addebita
                                                            penale</button>
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
        @endif
    </div>
</x-layout>
