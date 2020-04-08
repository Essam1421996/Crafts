<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\userimage;
use App\chat;
use App\notificationchat;
use App\notification;


class chatcontroller extends Controller
{

    public function allchat(){


      $users=User::where("id","!=",Auth::user()->id)->get();
     
     $imageall = userimage::where("user_id","!=",Auth::user()->id)->get();
     $chats=chat::where('sender','=',Auth::user()->name)->orWhere('reciever','=',Auth::user()->name)->orderBy('date')
            ->orderBy('time')->get();
       
         return view("crafts.chat",compact("users","chats","imageall","userimage"));


    }

    public function showchat(User $user){
     $users=User::where("id","!=",Auth::user()->id)->get();
     
    
     $imageall = userimage::where("user_id","!=",Auth::user()->id)->get();
     $chats=chat::where('sender','=',Auth::user()->name)->orWhere('reciever','=',Auth::user()->name)->orderBy('date')
            ->orderBy('time')->get();
     $userimage=userimage::where("user_id","=",$user->id)->get();
     
     return view("crafts.showchat",compact("users","chats","user","imageall","userimage"));


    }

    public function storemessage(User $user,Request $request){

      $message=new chat();
      $message->sender=Auth::user()->name;
      $message->reciever=$user->name;
      $message->content=$request->message;
      $message->date=date("Y-m-d");
      $h=(date("H"))+2;
        $m=date("i");
        $s=date("s");
        if($h>23)
        {
            $h=$h-24;
        }
        $message->time = date(($h).":".$m.":".$s);
       $message->save();
       if($message->sender==Auth::user()->name and $message->reciever==$user->name)
        {
            $noch=notificationchat::where([['owner','=',$user->name],['contacter','=',Auth::user()->name],['asread','=','1']])->count();
            if($noch==0)
            {
                $notchat = new notificationchat();
                $notchat->owner = $user->name;
                $notchat->contacter = Auth::user()->name;
                $notchat->content = Auth::user()->name." send message to you";
                $notchat->asread = 1;
                $notchat->date = date("Y-m-d");
                $h=(date("H"))+2;
                $m=date("i");
                $s=date("s");
                if($h>23)
                {
                    $h=$h-12;
                }
                $notchat->time = date(($h).":".$m.":".$s);
                $notchat->save();
            }
        }
        
       return back();






    }


    public function destroychat(User $user)
    {
        $allchat=chat::where([['sender','=',Auth::user()->name],['reciever','=',$user->name]])->
        orWhere([['reciever','=',Auth::user()->name],['sender','=',$user->name]])->delete();
        return back();

    }

    public function asreadchat(Request $request, notificationchat $notfchat)
    {
        $notfchat->asread = 0;
        $notfchat->save();
        return redirect()->back();
    }
    
}
