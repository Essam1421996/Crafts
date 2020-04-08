<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use App\group;
use App\craft;
use App\userimage;
use App\post;
use App\notificationchat;
use App\notification;


class crafts extends Controller
{
    //
    
    public function register(){
        $userscount=User::all()->count();
    	return view('crafts.register',compact('userscount'));
    }
    public function login(){
        return view('crafts.login');
    }

        public function index(){
     
        $groups=group::all();

        if(Auth::user()->purpose=="customer")
          {
        return redirect('/crafts/afterlogin/customer');
         }
         else if(Auth::user()->purpose=="craftsman"){ 
            return redirect('/crafts/afterlogin/craftsman');
        }
        else
            return redirect('/crafts/afterlogin/admin');
    }


    public function profile(){
    $posts=post::get()->all();
       

    return view('crafts.myposts',compact('posts'));

    }
    

    public function storeimage ($user_id,Request $request){


        $uselim=userimage::where('user_id', '=', Auth::user()->id)->count();
        if($uselim==1)
        {
            userimage::where('user_id', '=', Auth::user()->id)->delete();
            $file = $request->file('userimage');
            echo 'File Name: '.$file->getClientOriginalName();
            $destinationPath = 'img';
            $file->move($destinationPath,$file->getClientOriginalName());
        
        $userimage=new userimage();
        $userimage->user_id=Auth::user()->id;
        $userimage->picture=$file->getClientOriginalName();
         $userimage->save();
        return back();
        }


         else
        {
            $file = $request->file('userimage');
            echo 'File Name: '.$file->getClientOriginalName();
            $destinationPath = 'img';
            $file->move($destinationPath,$file->getClientOriginalName());
            $userimg=new userimage();
            $userimg->user_id=Auth::user()->id;
            $userimg->picture=$file->getClientOriginalName();
            $userimg->save();
            return redirect()->back();
        }


    }



    public function show_crafts($id){
        $group=group::find($id);
        $group_name=$group->name;

        $crafts=array();
        if($group!=null)
        $crafts= $group->crafts()->paginate('',['id','name','craftsman_id','craftsman_name','group_id','group_name']);
       

        return view('crafts.crafts',compact('crafts','group_name','id'));
    }


    public function show_groups(){
        $groups=group::all();
        

           return view('crafts.groups',compact('groups'));


    }

    
}
