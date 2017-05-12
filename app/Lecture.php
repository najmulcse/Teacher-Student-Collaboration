<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{

	protected $guarded=[''];
    protected $table='lectures';

    public function group(){

    	return $this->belongsTo('App\Group');
    }
    
}
