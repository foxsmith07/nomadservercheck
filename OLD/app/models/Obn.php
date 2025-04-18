<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obn extends Model
{
    protected $fillable = [
        'train','type','coach','num','ip','fw','conf'
    ];
}
