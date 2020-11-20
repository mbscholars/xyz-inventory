<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory_meta extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
            'key',
            'value'       
    ];
}
