<?php

namespace App\Models;

use App\Models\Train;
use Illuminate\Database\Eloquent\Model;

class Obn extends Model
{
    // protected $fillable = [
    //     'train_id','users',
    //     'm0','status0','slot0','tech0','iccid0',
    //     'm1','status1','slot1','tech1','iccid1',
    //     'm2','status2','slot2','tech2','iccid2',
    //     'sw1','ip1','fw1','conf1',
    //     'sw2','ip2','fw2','conf2',
    //     'sw3','ip3','fw3','conf3',
    //     'sw4','ip4','fw4','conf4',
    //     'sw5','ip5','fw5','conf5',
    //     'sw6','ip6','fw6','conf6',
    //     'sw7','ip7','fw7','conf7',
    //     'ap1','ip1','fw1','conf1',
    //     'ap2','ip2','fw2','conf2',
    //     'ap3','ip3','fw3','conf3',
    //     'ap4','ip4','fw4','conf4',
    //     'ap5','ip5','fw5','conf5',
    //     'ap6','ip6','fw6','conf6',
    //     'ap7','ip7','fw7','conf7',
    //     'ap8','ip8','fw8','conf8',
    //     'ap9','ip9','fw9','conf9',
    //     'ap10','ip10','fw10','conf10',
    //     'ap11','ip11','fw11','conf11',
    //     'ap12','ip12','fw12','conf12',
    //     'ap13','ip13','fw13','conf13',
    //     'ap14','ip14','fw14','conf14',
    // ];

    protected $fillable = [
        'train_id','type','coach','device','ip','firmware','config','lastcheck'
    ];

    protected $casts = [
        'lastcheck' => 'datetime',
    ];

    public function train(){
        return $this->belongsTo(Train::class);
    }
}
