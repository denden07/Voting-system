<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','photo_id','judge_id','is_admin','is_judge'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function judge(){
        return $this->belongsTo('App\Judge','judge_id');
    }

public function isAdmin(){
    if($this->is_admin == 1){
        return true;
    }
    return false;
}

    public function isJudge(){
        if($this->is_judge == 1){
            return true;
        }
        return false;
    }

}
