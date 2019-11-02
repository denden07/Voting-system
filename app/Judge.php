<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    //
    protected $fillable =[
        'firstname','middlename','lastname','address','age','contactNumber','email','photo_id','sex_id','event_id'
    ];
}
