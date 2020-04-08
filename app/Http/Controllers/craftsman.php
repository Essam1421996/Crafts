<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\group;
use App\craft;
use App\User;
use App\userimage;
use App\post;
use App\like;
use App\comment;
use App\notificationchat;
use App\notification;


class craftsman extends Controller
{


     public function index(){
      $posts=post::get()->all();
       
      return view ('crafts.craftsman_home',compact('posts'));


     }
	    public function add_group(Request $request){

      $group=new group();
      $group->name=$request->group_name;
      $group->save();
      return back();

    }

    
    public function add_craft(User $user,$id,Request $request){

         $craft=new craft();
         $group=group::find($id);
         $group_name=$group->name;
          $craft->name=$request->craft_name;
          $craft->craftsman_id=Auth::user()->id;
          $craft->craftsman_name=Auth::user()->name;
          $craft->group_id=$id;
          $craft->group_name=$group_name;
          $craft->save();
          return back();

    }


    public function craftedit(craft $craft){

        

        return view('crafts.editcraft',compact("craft"));




    }



    public function craftupdate(craft $craft,Request $request){

      $craft->name=$request->name;
      $craft->save();
      return redirect('crafts/afterlogin');


    }


    public function craftdestroy(craft $craft){

      $craft->delete();
      return back();
    }
}
