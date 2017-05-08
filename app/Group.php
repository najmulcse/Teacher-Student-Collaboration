<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded=[''];


    public function user(){

    return $this->belongsTo('App\User');
    }

    public function groupMembers(){

        return $this->hasMany('App\groupMember');
    }
}
