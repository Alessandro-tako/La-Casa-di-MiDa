<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PenaleApplicata extends Mailable
{
    public $booking;
    public $percentuale;
    public $amount;

    public function __construct($booking, $percentuale, $amount)
    {
        $this->booking = $booking;
        $this->percentuale = $percentuale;
        $this->amount = $amount;
    }

    public function build()
    {
        return $this->subject('Penale applicata alla prenotazione')
                    ->view('emails.penale-applicata');
    }
}
