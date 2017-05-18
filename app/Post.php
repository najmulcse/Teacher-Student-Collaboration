<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $guarded=[''];
    //
    public function getFileContent()
    {
    	return $this->hasMany('App\Content','content_type_id');
    }
}
