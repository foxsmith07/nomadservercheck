<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Covreport extends Model
{
    protected $fillable = [
        'day','time','train','worker','resolved','ticket','note'
    ]; 
}
