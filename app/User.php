<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function myGroups(){
        return $this->hasMany('App\Group');
    }
   

    public function joinedGroups()
    {
        return $this->belongsToMany('App\Group','group_members','user_id','group_id');
    }

    public function isAdmin()
    {
        return $this->user_type_id == 3;
    }
    // public function lectures()
    // {
    //     return $this->hasMany('App\Lecture');
    // }

    // public function group()
    // {
    //  return $this->
    // }
}
