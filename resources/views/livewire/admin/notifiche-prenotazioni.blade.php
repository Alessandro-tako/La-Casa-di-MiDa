<div wire:poll.10s="aggiornaContatore">
    @if ($prenotazioniInAttesa > 0)
        <div class="position-relative d-inline">
            <button wire:click="resetSuono"
                class="btn p-0 ms-2 border-0 bg-transparent position-relative campanella-attiva"
                title="Nuove prenotazioni">
                <i class="bi bi-bell-fill fs-5 text-warning"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $prenotazioniInAttesa }}
                </span>
            </button>
        </div>
    @endif
</div>
