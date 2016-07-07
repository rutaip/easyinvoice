<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'make',
        'model',
        'year',
        'mileage',
        'license_plate',
        'VIN',
        'customer_id',
        'notes',
    ];
}
