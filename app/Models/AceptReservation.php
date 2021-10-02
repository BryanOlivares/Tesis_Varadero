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

    public function scopeName($query, $name )
    {
        if($name)
        return $query->where('name', 'LIKE', "%$name%");
    }

    public function scopeEmail($query, $email )
    {
        if($email)
        return $query->where('email', 'LIKE', "%$email%");
    }

    public function scopeDate($query, $date )
    {
        if($date)
        return $query->where('date', 'LIKE', "%$date%");
    }
}
