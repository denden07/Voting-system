<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalScore extends Model
{
    //

    protected $fillable =[
      'contestant_id','finalScore','event_id','round_id','sex_id'
    ];

    public function contestant(){
        return $this->belongsTo('App\Contestant','contestant_id');
    }
}
