<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    //

    protected $fillable=[
        'contestant_id','criteria_id','score','judge_id'
    ];
}
