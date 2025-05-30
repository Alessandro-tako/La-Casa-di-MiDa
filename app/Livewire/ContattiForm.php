<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContattoUtenteMail;

class ContattiForm extends Component
{
    public $nome;
    public $email;
    public $messaggio;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'email' => 'required|email',
        'messaggio' => 'required|string|min:10',
    ];

    public function invia()
    {
        $this->validate();

        Mail::to('info@lacasadimida.it')->send(
            new ContattoUtenteMail($this->nome, $this->email, $this->messaggio)
        );

        $this->reset(['nome', 'email', 'messaggio']);
        session()->flash('success', 'Messaggio inviato con successo! Ti risponderemo al più presto.');
    }

    public function render()
    {
        return view('livewire.contatti-form');
    }
}
