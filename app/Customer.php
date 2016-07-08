<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'last_name',
        'name_attn',
        'address',
        'address_2',
        'city',
        'state',
        'zip',
        'country',
        'phone',
        'mobile',
        'fax',
        'email',
        'notes',
        'status',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
