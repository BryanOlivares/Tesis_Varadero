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
        'capacity',
        'time',
        'date',
        'image',
    ];

    public function createreservations()
    {
        return $this->hasMany('App\Createreservation');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
   
    public static function boot()
    {
        parent::boot();
        static::creating(function ($service) {
        $service->user_id = Auth::id();
    });
}

}
