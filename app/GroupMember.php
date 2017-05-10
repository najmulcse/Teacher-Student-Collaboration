<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
	protected $table='group_members';
    public function user()
    {
    	$this->belongsTo('App\User');
    }
    public function group()
    {
    	$this->belongsTo('App\Group');
    }
   

}
