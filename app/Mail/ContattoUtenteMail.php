<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContattoUtenteMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $nome;
    public string $email;
    public string $messaggio;

    public function __construct($nome, $email, $messaggio)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->messaggio = $messaggio;
    }

    public function build()
    {
        return $this->subject("Nuovo messaggio dal sito La Casa di MiDa")
                    ->view('emails.contatto');
    }
}
