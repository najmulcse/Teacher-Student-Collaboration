<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
	protected $table="group_members";
    public function group()
    {
    	return $this->belongsTo('App\Group');
    }
    public function student()
    {
    	return $this->hasOne('App\Student','user_id','user_id');
    }
    public function user()
    {
    	return $this->hasOne('App\User','id','user_id');
    }
    public function upload()
    {
    	return $this->hasOne('App\Upload','user_id','user_id');
    }
}
