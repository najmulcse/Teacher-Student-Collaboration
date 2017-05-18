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

        return $this->belongToMany('App\User');
    }
    // public function members(){
    // 	return $this->belongToMany('App\GroupMember','users','group_id','user_id');
    // }
    
    public function lectures(){
       return $this->hasMany('App\Lecture');
    }
    public function contents(){
       return $this->hasMany('App\Content');
    }

    

    
}


