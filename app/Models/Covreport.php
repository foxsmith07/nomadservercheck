<?php

namespace App\Models;

use App\Models\Train;
use Illuminate\Database\Eloquent\Model;

class Covreport extends Model
{
    protected $fillable = [
        'datetime','train_id','worker','request','resolved','ticket','note'
    ];

    protected $casts = [
        'datetime' => 'datetime',
    ];

    public function train(){
        return $this->belongsTo(Train::class);
    }
}
