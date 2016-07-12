<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number',
        'customer_id',
        'car_id',
        'total_tax',
        'total_sub',
        'total',
        'paid',
        'owing',
    ];
}
