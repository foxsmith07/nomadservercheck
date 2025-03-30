<?php

namespace App\Models;

use App\Models\Train;
use Illuminate\Database\Eloquent\Model;

class Covreport extends Model
{
    protected $fillable = [
        'day','time','train_id','worker','resolved','ticket','note'
    ];

    public function train(){
        return $this->belongsTo(Train::class);
    }
}
