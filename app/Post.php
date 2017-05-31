<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $guarded=[''];
    //
    public function contents()
    {
    	return $this->hasMany('App\Content');
    }
     public function group(){

    	return $this->belongsTo('App\Group');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function comments()
    {
            return $this->hasMany('App\Comment');
    }
    public function assignment()
    {
           return $this->hasOne('App\Assignment');
    }
    public function assignments()
    {
           return $this->hasMany('App\Assignment');
    }

    public function upload(){
        return $this->hasOne('App\Upload');
    }

    
}
