<?php

namespace App\Models;

use App\Models\Obn;
use App\Models\Siv;
use App\Models\roadmap;
use App\Models\Covreport;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Train extends Model
{
    protected $fillable = [
        'name',
        'number',
        'tipology'
    ];

    public function sivs()
    {
        return $this->hasMany(Siv::class);
    }

    public function covreports()
    {
        return $this->hasMany(Covreport::class);
    }

    public function obns()
    {
        return $this->hasMany(Obn::class);
    }

    // tutti gli switch
    public function switches(): HasMany
    {
        return $this->obns()->where('type', 'SW');
    }

    // tutti gli access point
    public function accessPoints(): HasMany
    {
        return $this->obns()->where('type', 'AP');
    }

    // ultima data di check
    public function lastCheck(): ?Carbon
    {
        $obn = $this->obns()
            ->orderByDesc('lastcheck')
            ->first();

        return $obn ? $obn->lastcheck : null;
    }

    public function roadmaps(){
        return $this->hasMany(roadmap::class);
    }
}
