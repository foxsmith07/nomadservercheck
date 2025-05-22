<?php

namespace App\Models;

use App\Models\Train;
use Illuminate\Database\Eloquent\Model;

class Obn extends Model
{

    protected $fillable = [
        'train_id','type','coach','device','ip','firmware','config','lastcheck','users'
    ];

    protected $casts = [
        'lastcheck' => 'datetime',
    ];

    public function train(){
        return $this->belongsTo(Train::class);
    }

}
