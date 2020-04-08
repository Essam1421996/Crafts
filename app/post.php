<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function likes(){

    	return $this->hasMany('App\like','post_id','id');
    }
    public function comments(){

    	return $this->hasMany('App\comment','post_id','id');
    }
}
