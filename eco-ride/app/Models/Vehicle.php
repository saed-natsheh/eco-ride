<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

    protected $fillable = [
        'license_plate',
        'brand',
        'model',
        'color',
        'energy_type',
        'capacity',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
