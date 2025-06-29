<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Booking extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'guest_first_name',
        'guest_last_name',
        'guest_email',
        'guest_address_street',
        'guest_address_city',
        'guest_address_country',
        'guest_address_zip',
        'room_name',
        'check_in',
        'check_out',
        'guests',
        'price',
        'payment_method',
        'penale_addebitata',
        'penale_ricevuta_url',
        'penale_pdf_path',
        'stripe_payment_method',
        'stripe_customer_id',
        'status',
        'locale',
        'terms_accepted',
        'terms_accepted_at',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
    ];


    public function toSearchableArray()
    {
        return [
            'id'               => $this->id,
            'guest_first_name' => $this->guest_first_name,
            'guest_last_name'  => $this->guest_last_name,
            'guest_email'      => $this->guest_email,
            'room_name'        => $this->room_name,
            'status'           => $this->status,
        ];
    }

}
