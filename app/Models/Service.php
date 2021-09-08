<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'service',
        'description',
        'time1',
        'time2',
        'date1',
        'date2',
    ];

    //public function create_reservations()
    //{
      //  return $this->hasMany('App\CreateReservation');
    //}

}

    
   


