<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverPreference extends Model
{

    protected $fillable = [
        'smoking',
        'pets',
        'custom',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
