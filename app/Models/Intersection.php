<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intersection extends Model
{
    use HasFactory;
    protected $fillable = [
        'traffic_id', 
        'name', 
        'latitude',
        'longitude',
        'waitingTimeInSeconds',
        'currentStatus'
    ];
}
