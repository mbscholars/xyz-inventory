<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'order_id',
        'address',
        'city',
        'state',
        'country',
        'status_desc',
        'status',
    ];
}
