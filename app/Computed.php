<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computed extends Model
{
    //

    protected $fillable =[
       'contestant_id','score','round_id','judge_id','event_id'
    ];

}
