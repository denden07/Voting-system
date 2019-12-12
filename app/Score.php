<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    //

    protected $fillable=[
        'contestant_id','criteria_id','score','judge_id','event_id','sex_id','round_id',
    ];

    public function judge(){
        return $this->belongsTo('App\Judge','judge_id');
    }

    public function contestant(){
        return $this->belongsTo('App\Contestant','contestant_id');
    }
}
