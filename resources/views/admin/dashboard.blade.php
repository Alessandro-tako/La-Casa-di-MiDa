<x-layout>
    <div class="container py-5">
        <h2 class="text-gold mb-4">Dashboard Amministratore</h2>

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

        <div class="mt-4 text-end">
            <a href="{{ route('admin.prenotazioni') }}" class="btn btn-gold rounded-pill">Vai a gestione prenotazioni</a>
        </div>
    </div>
</x-layout>
