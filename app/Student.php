<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $guarded =[''];
    public function uploads(){
       
       return $this->hasMany('App\Upload');

    }
}
