<x-layout>
    <div class="container py-5">
        <h2 class="text-gold mb-4 text-center">Gestione Prenotazioni</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Barra di ricerca --}}
        <form method="GET" action="{{ route('admin.prenotazioni') }}" class="mb-4 d-flex justify-content-center">
            <input type="text" name="search" class="form-control w-50 me-2"
                placeholder="Cerca per nome, email, camera..."
                value="{{ request('search') }}">
            <button class="btn btn-outline-dark" type="submit">Cerca</button>
        </form>

        @if ($prenotazioni->isEmpty())
            <p class="text-center">Nessuna prenotazione disponibile al momento.</p>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Camera</th>
                            <th>Date</th>
                            <th>Ospiti</th>
                            <th>Stato</th>
                            <th class="text-center">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prenotazioni as $prenotazione)
                            @php
                                $oggi = \Carbon\Carbon::now();
                                $checkin = \Carbon\Carbon::parse($prenotazione->check_in);
                                $checkout = \Carbon\Carbon::parse($prenotazione->check_out);
                                $status = $prenotazione->status;
                                $badgeClass = match ($status) {
                                    'confermata' => 'success',
                                    'annullata' => 'danger',
                                    default => 'warning',
                                };
                                $soggiorno = null;
                                if ($status === 'confermata') {
                                    if ($oggi->between($checkin, $checkout->copy()->subDay())) {
                                        $soggiorno = 'in_corso';
                                    } elseif ($oggi->gt($checkout)) {
                                        $soggiorno = 'concluso';
                                    } elseif ($oggi->lt($checkin)) {
                                        $soggiorno = 'in_arrivo';
                                    }
                                }
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
                                        @if ($status !== 'annullata')
                                            @if ($soggiorno === 'concluso')
                                                <span class="badge bg-secondary">Soggiorno concluso</span>
                                            @else
                                                @if ($status === 'in_attesa')
                                                    <form action="{{ route('admin.prenotazioni.update', $prenotazione) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="action" value="conferma">
                                                        <button class="btn btn-sm btn-success">Conferma</button>
                                                    </form>
                                                @endif

                                                <a href="{{ route('admin.prenotazioni.edit', $prenotazione) }}"
                                                    class="btn btn-sm btn-warning">Modifica</a>

                                                <form action="{{ route('admin.prenotazioni.update', $prenotazione) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Sei sicuro di voler annullare questa prenotazione?');">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="action" value="annulla">
                                                    <button class="btn btn-sm btn-danger">Annulla</button>
                                                </form>
                                            @endif
                                        @else
                                            @if (!$prenotazione->penale_addebitata && $prenotazione->stripe_customer_id && $prenotazione->stripe_payment_method)
                                                <form action="{{ route('admin.penale.addebita', $prenotazione) }}" method="POST"
                                                    onsubmit="return confirm('Vuoi davvero addebitare una penale a questa prenotazione annullata?');">
                                                    @csrf
                                                    <div class="d-flex flex-column align-items-center">
                                                        <select name="penale_percentuale" class="form-select form-select-sm mb-1" required>
                                                            <option value="" disabled selected>Seleziona penale</option>
                                                            <option value="0">Nessuna penale</option>
                                                            <option value="20">Penale 20% (cancellazione tardiva)</option>
                                                            <option value="100">Penale 100% (no-show)</option>
                                                        </select>
                                                        <button class="btn btn-sm btn-outline-dark">Addebita penale</button>
                                                    </div>
                                                </form>
                                            @elseif(!$prenotazione->stripe_customer_id || !$prenotazione->stripe_payment_method)
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
