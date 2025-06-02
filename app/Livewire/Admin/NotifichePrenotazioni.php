<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Booking;

class NotifichePrenotazioni extends Component
{
    public $prenotazioniInAttesa = 0;
    public $suonaCampanello = false;

    public function mount()
    {
        $this->aggiornaContatore();
    }

    public function aggiornaContatore()
    {
        $nuovoContatore = Booking::where('status', 'in_attesa')->count();

        if ($nuovoContatore > $this->prenotazioniInAttesa) {
            $this->suonaCampanello = true;
        }

        $this->prenotazioniInAttesa = $nuovoContatore;
    }

    public function render()
    {
        return view('livewire.admin.notifiche-prenotazioni');
    }

    public function resetSuono()
    {
        $this->suonaCampanello = false;
    }
}
