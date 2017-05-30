<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $guarded=[''];
    
    public function post()
    {
    	return $this->belongsTo('App\Post');
    }
}
