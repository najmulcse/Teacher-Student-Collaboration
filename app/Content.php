<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	protected $guarded=[''];
	
    public function group(){
    	return $this->belongsTo('App\Group');
    }
}
