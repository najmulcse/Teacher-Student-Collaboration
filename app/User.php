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
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table='users';

    public function groups(){
        return $this->hasMany('App\Group');
    }
    // public function groups(){

    //    return $this->hasManyThrough('App\Group','App\GroupMember','user_id','id');
    // }

    // public function members(){

    //     return $this->hasMany('App\GroupMember');
    // }
}
