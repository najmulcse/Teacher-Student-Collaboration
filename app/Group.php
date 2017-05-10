<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded=[''];
    protected $table='groups';

    public function user(){

    return $this->belongsTo('App\User');
    }

    // public function users(){

    //     return $this->hasMany('App\GroupMember','group_id','id');
    // }
    // public function members(){
    // 	return $this->hasMany('App\GroupMember');
    // }


    
}
