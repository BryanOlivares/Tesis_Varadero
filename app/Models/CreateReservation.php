<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CreateReservation extends Model
{
    
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

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    // public function service()
    // {
    //    return $this->belongsTo('App\Service');
    // }
    
    public static function boot()
    {
        parent::boot();
        static::creating(function ($createreservations) {
        $createreservations->user_id = Auth::id();
        });
    }
}
