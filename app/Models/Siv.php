<?php

namespace App\Models;

use App\Models\Train;
use Illuminate\Database\Eloquent\Model;

class Siv extends Model
{
    protected $fillable = [
        'train_id','description'
    ];

    public function train(){
        return $this->belongsTo(Train::class);
    }
}
