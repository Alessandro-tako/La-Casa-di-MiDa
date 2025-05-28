<?php

namespace App\Livewire;

use Livewire\Component;

class ContattiForm extends Component
{
    public $nome, $email, $messaggio;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'email' => 'required|email',
        'messaggio' => 'required|string|max:1000',
    ];

    public function submit()
    {
        $this->validate();

        // Puoi mandare una mail o salvarlo nel DB qui

        session()->flash('success', 'Messaggio inviato con successo!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.contatti-form');
    }
}
