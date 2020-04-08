<?php

namespace App\Http\Controllers;

use App\adminnotif;
use App\comment;
use App\like;
use App\post;
use App\craft;
use App\User;
use App\userimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\chat;

class admincontroller extends Controller
{
    public function index()
    {
        $users=User::where('id','!=',Auth::user()->id)->orderBy('created_at', 'desc')->limit(8)->get();
        $crafts=craft::orderBy('created_at', 'desc')->limit(8)->get();
        /*****************/
        $userimage = userimage::where("user_id","=",Auth::user()->id)->get();
        $userimagecount = userimage::where("user_id","=",Auth::user()->id)->count();
        $imageall = userimage::get();
        /*****************/
        //for counts
        $usercount=User::where('id', '!=', Auth::user()->id)->count();
        $craftcount=craft::count();
        $postcount=post::count();
        $likecount=like::count();
        $commentcount=comment::count();
        $particpate=intdiv((3*$usercount/($craftcount+$postcount+$likecount))*100,1);
        /********************************************************************/
        $notifaction = adminnotif::where([['owner', '=', Auth::user()->name],['asread','=',1]])->orderBy('date', 'desc')->
        orderBy('time', 'desc')->limit(6)->get();
        $notifcount = adminnotif::where([['owner', '=', Auth::user()->name],['asread','=',1]])->count();
        /********************************************************************/
        return view('admin.admin',compact('users','crafts','userimage','userimagecount','imageall',
            'usercount','craftcount','postcount','commentcount','likecount','particpate',
            'notifaction','notifcount'));
    }
    public function users()
    {
        $users=User::where('id','!=',Auth::user()->id)->orderBy('created_at', 'desc')->limit(8)->get();
        $userwork=User::where('id','!=',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $crafts=craft::orderBy('created_at', 'desc')->limit(8)->get();
        /*****************/
        $userimage = userimage::where("user_id","=",Auth::user()->id)->get();
        $userimagecount = userimage::where("user_id","=",Auth::user()->id)->count();
        $imageall = userimage::get();
        /*****************/
        //for counts
        $usercount=User::where('id', '!=', Auth::user()->id)->count();
        $craftcount=craft::count();
        $postcount=post::count();
        $likecount=like::count();
        $commentcount=comment::count();
        $particpate=0;
        if($usercount !=0 and $craftcount !=0 and $postcount !=0 and $likecount !=0)
        {
            $particpate=intdiv((3*$usercount/($craftcount+$postcount+$likecount))*100,1);
        }
        /********************************************************************/
        $notifaction = adminnotif::where([['owner', '=', Auth::user()->name],['asread','=',1]])->orderBy('date', 'desc')->
        orderBy('time', 'desc')->limit(6)->get();
        $notifcount = adminnotif::where([['owner', '=', Auth::user()->name],['asread','=',1]])->count();
        /********************************************************************/
        return view('admin.adminuser',compact('users','userwork','crafts','userimage','userimagecount',
            'imageall', 'usercount','craftcount','postcount','commentcount','likecount','particpate',
            'notifaction','notifcount'));
    }
    public function userdestroy(User $user)
    {
        $user->delete();
        return redirect('crafts/afterlogin/admin/users');

    }//end of destroy
    /******************************************/
    public function crafts()
    {
        $users=User::where('id','!=',Auth::user()->id)->orderBy('created_at', 'desc')->limit(8)->get();
        $craftwork=craft::orderBy('created_at', 'desc')->get();
        $crafts=craft::orderBy('created_at', 'desc')->limit(8)->get();
        /*****************/
        $userimage = userimage::where("user_id","=",Auth::user()->id)->get();
        $userimagecount = userimage::where("user_id","=",Auth::user()->id)->count();
        $imageall = userimage::get();
        /*****************/
        //for counts
        $usercount=User::where('id', '!=', Auth::user()->id)->count();
        $craftcount=craft::count();
        $postcount=post::count();
        $likecount=like::count();
        $commentcount=comment::count();
        $particpate=0;
        if($usercount !=0 and $craftcount !=0 and $postcount !=0 and $likecount !=0)
        {
            $particpate=intdiv((3*$usercount/($craftcount+$postcount+$likecount))*100,1);
        }
        /********************************************************************/
        $notifaction = adminnotif::where([['owner', '=', Auth::user()->name],['asread','=',1]])->orderBy('date', 'desc')->
        orderBy('time', 'desc')->limit(6)->get();
        $notifcount = adminnotif::where([['owner', '=', Auth::user()->name],['asread','=',1]])->count();
        /********************************************************************/
        return view('admin.admincraft',compact('users','crafts','craftwork','userimage',
            'userimagecount','usercount','craftcount','postcount','commentcount','likecount','particpate',
            'notifaction','notifcount'));
    }
    public function craftdestroy(craft $craft)
    {
        $craft->delete();
        return redirect('crafts/afterlogin/admin/crafts');

    }//end of destroy
    /******************************************/
    public function posts()
    {
        $users=User::where('id','!=',Auth::user()->id)->orderBy('created_at', 'desc')->limit(8)->get();
        $postwork=post::orderBy('created_at', 'desc')->get();
        $crafts=craft::orderBy('created_at', 'desc')->limit(8)->get();
        /*****************/
        $userimage = userimage::where("user_id","=",Auth::user()->id)->get();
        $userimagecount = userimage::where("user_id","=",Auth::user()->id)->count();
        $imageall = userimage::get();
        //for counts
        $usercount=User::where('id', '!=', Auth::user()->id)->count();
        $craftcount=craft::count();
        $postcount=post::count();
        $likecount=like::count();
        $commentcount=comment::count();
        $particpate=intdiv((3*$usercount/($craftcount+$postcount+$likecount))*100,1);
        /********************************************************************/
        $notifaction = adminnotif::where([['owner', '=', Auth::user()->name],['asread','=',1]])->orderBy('date', 'desc')->
        orderBy('time', 'desc')->limit(6)->get();
        $notifcount = adminnotif::where([['owner', '=', Auth::user()->name],['asread','=',1]])->count();
        /********************************************************************/
        return view('admin.adminpost',compact('users','crafts','postwork','userimage','userimagecount',
            'imageall','usercount','craftcount','postcount','commentcount','likecount','particpate',
            'notifaction','notifcount'));
    }
    public function postdestroy(post $post)
    {
        $post->delete();
        return redirect('crafts/afterlogin/admin/posts');

    }//end of destroy
    /**********************************************/
    //admin categories
    // AS READ NOTF
    public function asread(Request $request, adminnotif $notf)
    {
        $notf->asread = 0;
        $notf->save();
        return redirect()->back();
    }

    public function chat(User $user){

       $users=User::where('id','!=',Auth::user()->id)->orderBy('created_at', 'desc')->limit(8)->get();
        $postwork=post::orderBy('created_at', 'desc')->get();
        $crafts=craft::orderBy('created_at', 'desc')->limit(8)->get();
        /*****************/
        $userimage = userimage::where("user_id","=",Auth::user()->id)->get();
        $userimagecount = userimage::where("user_id","=",Auth::user()->id)->count();
        $imageall = userimage::get();
        //for counts
        $usercount=User::where('id', '!=', Auth::user()->id)->count();
        $craftcount=craft::count();
        $postcount=post::count();
        $likecount=like::count();
        $commentcount=comment::count();
        $particpate=intdiv((3*$usercount/($craftcount+$postcount+$likecount))*100,1);

     $authimage = userimage::where("user_id","=",Auth::user()->id)->get();
     $imageall = userimage::where("user_id","!=",Auth::user()->id)->get();
     $chats=chat::where('sender','=',Auth::user()->name)->orWhere('reciever','=',Auth::user()->name)->orderBy('date')
            ->orderBy('time')->get();
     $userimage=userimage::where("user_id","=",$user->id)->get();
    
        /********************************************************************/
        $notifaction = adminnotif::where([['owner', '=', Auth::user()->name],['asread','=',1]])->orderBy('date', 'desc')->
        orderBy('time', 'desc')->limit(6)->get();
        $notifcount = adminnotif::where([['owner', '=', Auth::user()->name],['asread','=',1]])->count();
        return view('admin.chat',compact('users','crafts','user','authimage','postwork','userimage','userimage','chats','imageall','userimagecount',
            'imageall','usercount','craftcount','postcount','commentcount','likecount','particpate',
            'notifaction','notifcount'));
    }
}
