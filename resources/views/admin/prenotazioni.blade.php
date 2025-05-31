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
                                    @if($prenotazione->status === 'in_attesa')
                                        <form action="{{ route('admin.prenotazioni.update', $prenotazione) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="action" value="conferma">
                                            <button class="btn btn-sm btn-success">Conferma</button>
                                        </form>

                                        <form action="{{ route('admin.prenotazioni.update', $prenotazione) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="action" value="annulla">
                                            <button class="btn btn-sm btn-danger">Annulla</button>
                                        </form>
                                    @else
                                        <em>Nessuna azione</em>
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
