<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalBooking extends Model
{
    protected $fillable = [
        'room_name',
        'check_in',
        'check_out',
        'uid',
        'source',
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
    ];

}

