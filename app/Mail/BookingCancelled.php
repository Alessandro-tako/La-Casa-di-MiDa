<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class BookingCancelled extends Mailable
{
    use Queueable, SerializesModels;

    public Booking $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Prenotazione Annullata - La Casa di MiDa',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking.guest-cancelled',
            with: ['booking' => $this->booking],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
