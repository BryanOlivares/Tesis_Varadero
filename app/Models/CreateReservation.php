<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CreateReservation extends Model
{
    
    protected $fillable = [
        'service',
        'name',
        'lastname',
        'date',
        'time',
        'capacity',
    ];

    

}
