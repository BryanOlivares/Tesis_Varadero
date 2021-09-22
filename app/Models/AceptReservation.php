<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AceptReservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'service',
        'name',
        'email',
        'date',
        'time',
        'capacity',
        'state',
        'comment',
        'pay',
    ];
}
