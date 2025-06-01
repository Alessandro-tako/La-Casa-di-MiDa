<x-layout>
    <div class="container py-5">
        <h2 class="text-gold mb-4 text-center">Gestione Prenotazioni</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($prenotazioni->isEmpty())
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
                        @foreach($prenotazioni as $prenotazione)
                            <tr>
                                <td>{{ $prenotazione->id }}</td>
                                <td>
                                    {{ $prenotazione->guest_first_name }} {{ $prenotazione->guest_last_name }}<br>
                                    <small>{{ $prenotazione->guest_email }}</small>
                                </td>
                                <td>{{ $prenotazione->room_name }}</td>
                                <td>
                                    <strong>{{ \Carbon\Carbon::parse($prenotazione->check_in)->format('d/m/Y') }}</strong> →
                                    <strong>{{ \Carbon\Carbon::parse($prenotazione->check_out)->format('d/m/Y') }}</strong>
                                </td>
                                <td>{{ $prenotazione->guests }}</td>
                                <td>
                                    @php
                                        $status = $prenotazione->status;
                                        $badgeClass = match($status) {
                                            'confermata' => 'success',
                                            'annullata' => 'danger',
                                            default => 'warning',
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $badgeClass }}">{{ ucfirst($status) }}</span>
                                </td>
                                <td class="text-center">
                                    {{-- Azioni disponibili sempre tranne se annullata --}}
                                    @if($prenotazione->status !== 'annullata')
                                        {{-- Conferma solo se è in attesa --}}
                                        @if($prenotazione->status === 'in_attesa')
                                            <form action="{{ route('admin.prenotazioni.update', $prenotazione) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="action" value="conferma">
                                                <button class="btn btn-sm btn-success">Conferma</button>
                                            </form>
                                        @endif

                                        {{-- Pulsante modifica date --}}
                                        <a href="{{ route('admin.prenotazioni.edit', $prenotazione) }}" class="btn btn-sm btn-warning d-inline">Modifica</a>

                                        {{-- Pulsante annulla --}}
                                        <form action="{{ route('admin.prenotazioni.update', $prenotazione) }}" method="POST" class="d-inline" onsubmit="return confirm('Sei sicuro di voler annullare questa prenotazione?');">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="action" value="annulla">
                                            <button class="btn btn-sm btn-danger">Annulla</button>
                                        </form>
                                    @else
                                        <em>Annullata</em>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-layout>
