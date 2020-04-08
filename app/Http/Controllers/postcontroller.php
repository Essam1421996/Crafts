<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\post;
use App\like;
use App\comment;
use App\userimage;
use App\notificationchat;
use App\notification;

class postcontroller extends Controller
{
    
    public function add_post(Request $request){

     $post=new post();
     $post->content=$request->post_content;
     $post->owner_id=Auth::user()->id;
     $post->owner_name=Auth::user()->name;
     $post->date=date("Y-m-d");
     $h=(date("H"))+2;
        $m=date("i");
        $s=date("s");
        if($h>23)
        {
            $h=$h-24;
        }
        $post->time = date(($h).":".$m.":".$s);
      $post->save();
      return back();


    }

    public function edit_post(post $post){
       

        return view('crafts.editpost',compact("post"));
    }
    public function update_post(post $post,Request $request){
        
        $post->content = $request->content;
        $post->save();
        return redirect('crafts/afterlogin');

    }

    public function destroy(post $post)
    {
        $post->delete();
        return redirect()->back();

    }


    public function editcomment(comment $comment){

         

        return view('crafts.editcomment',compact("comment"));

    }


    public function updatecomment(Request $request, comment $comment)
    {
        $comment->content = $request->content;
        $comment->save();
         if($comment->post->owner_name != $comment->owner)
        {
            $notifaction =new notification();
            $notifaction->owner = $comment->post->owner_name;
            $notifaction->content = Auth::user()->name." edit his comment on your post : ". $comment->post->content;
            $notifaction->asread = 1;
            $notifaction->date = date("Y-m-d");
            $h=(date("H"))+2;
            $m=date("i");
            $s=date("s");
            if($h>23)
            {
                $h=$h-24;
            }
            $notifaction->time = date(($h).":".$m.":".$s);
            $notifaction->save();
        }

        
        return redirect('crafts/afterlogin');
    }


     public function destroycomment(comment $comment)
    {
      $post_id=$comment->post_id;
       $post=post::find($post_id);
       $comment->delete();
       if($post->owner_name != $comment->owner)
        {
            $notifaction =new notification();
            $notifaction->owner = $post->owner_name;
            $notifaction->content = Auth::user()->name." destroy comment:".$comment->content." ,on your post : ".$post->content;
            $notifaction->asread = 1;
            $notifaction->date = date("Y-m-d");
            $h=(date("H"))+2;
            $m=date("i");
            $s=date("s");
            if($h>23)
            {
                $h=$h-12;
            }
            $notifaction->time = date(($h).":".$m.":".$s);
            $notifaction->save();
        }
        
        return back();

    }


    public function add_like ($post_id,Request $request){
        $post=post::find($post_id);
        $likee=like::where([['user_id', '=', Auth::user()->id],['post_id','=',$post->id]])->count();
        if($likee==1)
        {
            like::where([['user_id', '=', Auth::user()->id],['post_id','=',$post->id]])->delete();
            if(($post->owner_id != Auth::user()->id)&&($post->owner_name != Auth::user()->name)){
            $notifaction =new notification();
            $notifaction->owner = $post->owner_name;
            $notifaction->content = Auth::user()->name." remove his like on  your post : ".$post->content;
            $notifaction->asread = 1;
            $notifaction->date = date("Y-m-d");
            $h=(date("H"))+2;
            $m=date("i");
            $s=date("s");
            if($h>23)
            {
                $h=$h-12;
            }
            $notifaction->time = date(($h).":".$m.":".$s);
            $notifaction->save();
        }


            return redirect()->back();
        }
        
        

       else{

        $like=new like();
        $like->post_id=$post_id;
        $like->user_id=Auth::user()->id;
        $like->save();
        if(($post->owner_id != Auth::user()->id)&&($post->owner_name != Auth::user()->name)){
       
            $notifaction =new notification();
            $notifaction->owner = $post->owner_name;
            $notifaction->content = Auth::user()->name." Liked your post : ".$post->content;
            $notifaction->asread = 1;
            $notifaction->date = date("Y-m-d");
            $h=(date("H"))+2;
            $m=date("i");
            $s=date("s");
            if($h>23)
            {
                $h=$h-24;
            }
            $notifaction->time = date(($h).":".$m.":".$s);
            $notifaction->save();
        }

        return redirect()->back();
      }


    }

    public function add_comment($post_id,Request $request){

     $post=post::find($post_id);
     $comment=new comment();
     $comment->post_id=$post_id;
     $comment->owner=Auth::user()->name;
     $comment->owner_id=Auth::user()->id;
     $comment->content=$request->comment;
     $comment->date=date("Y-m-d");
      $h=(date("H"))+2;
        $m=date("i");
        $s=date("s");
        if($h>23)
        {
            $h=$h-24;
        }
        $comment->time = date(($h).":".$m.":".$s);
    $comment->save();
    if($post->owner_name != $comment->owner)
        {
            $notifaction =new notification();
            $notifaction->owner = $post->owner_name;
            $notifaction->content = Auth::user()->name." comment on your post : ".$post->content;
            $notifaction->asread = 1;
            $notifaction->date = date("Y-m-d");
            $h=(date("H"))+2;
            $m=date("i");
            $s=date("s");
            if($h>23)
            {
                $h=$h-12;
            }
            $notifaction->time = date(($h).":".$m.":".$s);
            $notifaction->save();
        }
       
    return back();

    }

      public function asread(Request $request, notification $notf)
    {
        $notf->asread = 0;
        $notf->save();
        
        return redirect()->back();
    }
    public function profile($owner_id){

         $user_image = userimage::where("user_id","=",$owner_id)->get();
        
        $profile=User::where("id","=",$owner_id)->get();

    $posts=post::where("owner_id","=",$owner_id)->get();
       

    return view('crafts.profile',compact('user_image','posts','owner_id','profile'));



    }
   
}
