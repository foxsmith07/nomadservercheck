<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
        'train','event','impact','start_expected','start_actual','end_expected',
    ];

    // protected $casts = [
    //     'start_expected' => 'datetime',
    //     'start_actual' => 'datetime',
    //     'end_expected' => 'datetime',
    // ];
}
