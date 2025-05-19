<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{

    protected $fillable = [
        'departure',
        'arrival',
        'date',
        'departure_time',
        'arrival_time',
        'price',
        'vehicle_id',
        'user_id',
        'available_seats',
        'is_eco',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
