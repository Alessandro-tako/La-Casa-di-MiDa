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
        'room_name',
        'check_in',
        'check_out',
        'price',
    ];
}
