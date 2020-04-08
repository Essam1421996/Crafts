<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group extends Model
{
	public function crafts(){
    return $this->hasMany('App\craft','group_id','id');
     }
}
