<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class BookingUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public Booking $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;

        // Imposta la lingua della mail in base alla prenotazione
        App::setLocale($booking->locale ?? 'it');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('ui.subject_updated') // Tradotto dinamicamente
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking.guest-updated',
            with: ['booking' => $this->booking],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
