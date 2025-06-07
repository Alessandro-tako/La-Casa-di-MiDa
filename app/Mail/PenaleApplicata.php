<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class PenaleApplicata extends Mailable
{
    use Queueable, SerializesModels;

    public Booking $booking;
    public float $percentuale;
    public float $amount;

    public function __construct(Booking $booking, float $percentuale, float $amount)
    {
        $this->booking = $booking;
        $this->percentuale = $percentuale;
        $this->amount = $amount;

        // Imposta la lingua in base alla prenotazione
        App::setLocale($booking->locale ?? 'it');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('ui.subject_penalty_applied'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking.penalty-applied',
            with: [
                'booking' => $this->booking,
                'percentuale' => $this->percentuale,
                'amount' => $this->amount,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
