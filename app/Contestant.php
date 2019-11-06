<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    //

    protected $fillable = [
        'firstname','middlename','lastname','age','sex_id','number','contactNumber','address','photo_id','event_id'
    ];


}