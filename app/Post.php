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
}
