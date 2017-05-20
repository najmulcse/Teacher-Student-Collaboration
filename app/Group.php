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
    
    public function posts(){
       return $this->hasMany('App\Post');
    }
    
    public function contents(){
       return $this->hasMany('App\Content');
    }

    

    
}


