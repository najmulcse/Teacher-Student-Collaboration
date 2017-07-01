<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded=[''];
    

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
    
    public function posts(){
       return $this->hasMany('App\Post');
    }
    
    public function contents(){
       return $this->hasMany('App\Content');
    }
    public function members()
    {
       return $this->hasMany('App\GroupMember');
    }
     public function member()
    {
       return $this->hasOne('App\GroupMember');
    }

    public function usertype(){

        return $this->hasOne('App\UserType');
    }

    

    
}


