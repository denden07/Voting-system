<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    //
    protected $fillable =[
    'contestant_id','score','criteria_id','round_id','sex_id','event_id'
    ];

    public function contestant(){
        return $this->belongsTo('App\Contestant');
    }

}
