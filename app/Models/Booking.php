<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

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
    'stripe_payment_method',
    'stripe_customer_id',

];

}
