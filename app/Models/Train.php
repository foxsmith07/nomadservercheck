<?php

namespace App\Models;

use App\Models\Obn;
use App\Models\Siv;
use App\Models\Covreport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Train extends Model
{
    protected $fillable = [
        'name','number','tipology'
    ];

    public function sivs(){
        return $this->hasMany(Siv::class);
    }

    public function covreports(){
        return $this->hasMany(Covreport::class);
    }

    public function obns(){
        return $this->hasMany(Obn::class);
    }
}
