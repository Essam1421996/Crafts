<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\post;
use App\like;
use App\comment;
use App\userimage;
use App\notificationchat;
use App\notification;

class like extends Model
{
    

        public function post(){

        	return $this->belongsTo('App\post','post_id','id');
        }


       static function like($post_id){


       	$post=post::find($post_id);
        $likee=like::where([['user_id', '=', Auth::user()->id],['post_id','=',$post->id]])
        ->count();
        if($likee==1)
        {

              return "like";
            }

            else
            	return "dislike";


       }
}
