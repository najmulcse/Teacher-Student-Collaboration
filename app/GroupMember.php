<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    public function user()
    {
    	$this->belongsTo('App\User');
    }
    public function group()
    {
    	$this->belongsTo('App\Group');
    }
    
}
