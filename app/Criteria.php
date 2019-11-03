<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    //
    protected $fillable = [
        'name','percentage','category','event_id','round_id',
    ];
}
