<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class AdminBookingNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hai ricevuto una nuova prenotazione',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking.admin-notification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
