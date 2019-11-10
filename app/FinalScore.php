<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalScore extends Model
{
    //

    protected $fillable =[
      'contestant_id','finalScore','event_id','round_id'
    ];

}
