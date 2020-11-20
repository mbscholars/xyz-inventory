<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;
    protected $table = 'inventories';

    protected $fillable = [
        'title',
'creator',
'desc',
'category',
'quantity',
'quantity_sold',
'status'
    ];
}
