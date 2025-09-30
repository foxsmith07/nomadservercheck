<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
        protected $fillable = [
        'name',
        'description',
        'position',
        'nmid',
        'quantity_stock',
        'quantity_ordered',
        'quantity_shipped',
        'data_ordered',
        'data_shipped'
    ];


    protected $casts = [
        'data_ordered' => 'datetime',
        'data_shipped' => 'datetime',
    ];
}
