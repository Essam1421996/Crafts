<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\group;
use App\User;
use App\post;
use App\like;
use App\comment;
use App\userimage;
use App\notificationchat;
use App\notification;

class craft extends Model
{
     public function groups(){
        return $this->belongsTo('App\group');
    }

    static function authimage (){
                 
         $authimage = userimage::where("user_id","=",Auth::user()->id)->get();
         return  $authimage;
       

    }
    static function notifchat(){

    	 $notifchat = notificationchat::where([['owner', '=', Auth::user()->name],['asread','=',1]])->orderBy('date', 'desc')->
        orderBy('time', 'desc')->limit(3)->get();

        return  $notifchat;

    }

    static function notifchatcount(){

    	 $notifchatcount = notificationchat::where([['owner', '=', Auth::user()->name],['asread','=',1]])->count();
    	 return  $notifchatcount;

    }
    static function notifaction(){

    	$notifaction = notification::where([['owner', '=', Auth::user()->name],['asread','=',1]])->orderBy('date', 'desc')->
        orderBy('time', 'desc')->limit(3)->get();
        return $notifaction;

    }
    static function notifcount(){


        $notifcount = notification::where([['owner', '=', Auth::user()->name],['asread','=',1]])->count();
        return $notifcount;

    }
}
