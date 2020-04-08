@extends('crafts.master2')
@section('container')
<section id="Me">
<div class="container">
  <div id="smallpost" class="text-center col-lg-9">
                <input type="text" name="smallpost" id="smallpost" placeholder="Write your post..." class="col-lg-6 col-lg-offset-3 col-xs-10 col-xs-offset-1">
            </div>
           <div id="Post" class="col-lg-9">
     <form action="{{route('add_post')}}" id="cpost" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div id="write" class="col-lg-6 col-lg-offset-3 col-xs-10 col-xs-offset-1">
                        <textarea name="post_content" id="example" value="{{ old('post_content') }}" rows="10" class="col-xs-12"
                        style="border: 1px solid #ccc;border-radius: 15px;" placeholder="Enter your post....."></textarea>
                        <button type="submit"  class="btn btn-success btn-lg" style="margin-top: 4px;">Publish</button>
                    </div>
                </form>
            </div>
<div id="posts" class="col-lg-10 col-lg-offset-1 col-xs-12">

@foreach($posts as $post)
              
                    <div id='post1' class='col-xs-12'>
                    <div id='head' class='col-xs-12'>
                    @if(Auth::user()->name==$post->owner_name) 
    <a href="#"  class="col-lg-2">
    <h3 class="text-primary">{{$post->owner_name}}</h3></a>
    
    @else(Auth::user()->name!=$post->owner_name)
    <a href="{{route('profile',$post->owner_id)}}" target="_blank" class="col-lg-2">
    <h3 class="text-primary">{{$post->owner_name}}</h3></a>
    
    @endif
    <h3 class="text-primary col-lg-4"><i class="fa fa-clock-o text-danger"></i>
                                        <span class="text-info" style="font-size: 13px;">{{$post->date}}  {{$post->time}}</span></h3>
             </div> 
             @if(Auth::user()->id==$post->owner_id)
                <button type="submit" style="border: none;background-color: #ffffff; margin: 10px;" title="edit this post">
                                <a href="../afterlogin/{{$post->id}}/edit"><i class="fa fa-edit fa-2x text-warning pull-left"></i></a>
                            </button>
                            <form action="../afterlogin/{{$post->id}}/destroy" method="post" style="display: inline;">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <button type="submit" style="border: none;background-color: #ffffff;" title="delete this post">
                                    <i class="fa fa-3x text-danger fa-trash"></i></button>
                            </form>
                           @endif
                     
    <div id='contain' class='col-xs-10 col-xs-offset-1' style="color: #082a38;">
                          
    {{$post->content}}

    

                             <hr>

                            <a id="likepost" href="{{route('add_like',$post->id)}}" style="color: #000">
                                <i class="fa fa-thumbs-up col-xs-offset-1" id="{{ App\like::like($post->id)}}"></i></a>
                            <span style="color: #0c5460" >( {{$post->likes->count()}} )</span>
                            <a id="commentpost" href="#" style="color: #000"><i class="fa fa-comment col-xs-offset-8"></i></a>
                            <span style="color: #0c5460"> ( {{$post->comments->count()}} )</span>
                            <hr>

    </div>
       <div id='coments' class='col-xs-offset-1'>
                            @foreach($post->comments as $comment)
                                    <div id="comment1">
                                        <div id='head' class='col-xs-12'>
                                        @if($comment->owner==Auth::user()->name)
                                                   <a href="#" class="col-lg-2">
                                                <h5 class="text-primary" style="font-size: 17px;">{{$comment->owner}}</h5></a>
                                                @else
                                                 <a href="{{route('profile',$comment->owner_id)}}" target="_blank" class="col-lg-2">
                                                <h5 class="text-primary" style="font-size: 17px;">{{$comment->owner}}</h5></a>
                                                @endif
                                            <h5 class="text-primary col-lg-4"><i class="fa fa-clock-o text-danger"></i>
                                                <span class="text-info" style="font-size: 13px;">{{$comment->date}}  {{$comment->time}}</span></h5>
                                        </div>
                                        @if(Auth::user()->name==$comment->owner)
                                         <button type="submit" style="border: none;background-color: #ffffff;" title="edit this comment" class="pull-right">
                                            <a href="../afterlogin/{{$comment->id}}/editcomment"><i class="fa fa-edit" style="color: #3e5556; font-size: 20px;"></i></a>
                                        </button>
                                        <form action="../afterlogin/{{$comment->id}}/destroycomment" method="post" style="display: inline;">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                            <button type="submit" style="border: none;background-color: #ffffff;" title="delete this post" class="pull-right">
                                                <i class="fa fa-trash" style="color: #3e5556;"></i></button>
                                        </form>@endif
                                        <div id='contain' class='col-xs-10 col-xs-offset-2' style="color: #082a38;">
                                            {{$comment->content}}
                                            <hr>
                                        </div>
                                    </div> 
                                    @endforeach 
    
        <div id="addcom">
                                <form role="form" method="post" action="{{route('add_comment',$post->id)}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}
                                    <div class="form-group ">
                                        <input type="text" class=" input-lg col-md-9 col-md-offset-1 col-xs-12"
                                               style="border: 2px solid #5cb85c; margin-right: 2px;" name="comment"  value="{{ old('comment') }}"
                                               placeholder="Enter your comment..." autocomplete="off" required>
                                        <button type="submit" class="btn btn-success btn-lg col-md-1">Add</button>
                                    </div>
                                </form>
                            </div>                       
                             
    </div>
   </div>
    @endforeach
    
     </div>

</div>
</div>
</div>
</section>
  

@endsection