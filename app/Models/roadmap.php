<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roadmap extends Model
{
    protected $fillable = [
        'train_id','serial','start','end','location','fluke','note'
    ];

    public function train(){
        return $this->belongsTo(Train::class);
    }
}
