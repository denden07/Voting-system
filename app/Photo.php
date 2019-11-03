<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = [
        'contestant_id','judge_id','user_id','file'
    ];

    protected $uploads ='/images/';

    public function getFileAttribute($photo){

        return $this->uploads .$photo;
    }

}
