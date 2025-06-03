<div wire:poll.10s="aggiornaContatore" role="region" aria-live="polite" aria-label="Notifiche prenotazioni">
    @if ($prenotazioniInAttesa > 0)
        <div class="position-relative d-inline">
            <button
                wire:click="resetSuono"
                class="btn p-0 ms-2 border-0 bg-transparent position-relative campanella-attiva"
                title="Ci sono nuove prenotazioni in attesa"
                aria-label="Hai {{ $prenotazioniInAttesa }} nuove prenotazioni"
            >
                <i class="bi bi-bell-fill fs-5 text-warning" aria-hidden="true"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <span class="visually-hidden">Notifiche:</span>
                    {{ $prenotazioniInAttesa }}
                </span>
            </button>
        </div>
    @endif
</div>
