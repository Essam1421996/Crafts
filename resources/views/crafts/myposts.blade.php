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
            <div id="posts" class="col-lg-9 col-xs-12">
            @foreach($posts as $post)
            @if(Auth::user()->name==$post->owner_name)
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
                                <i class="fa fa-thumbs-up col-xs-offset-1"></i></a>
                            <span style="color: #0c5460">( {{$post->likes->count()}} )</span>
                            <a id="commentpost" href="#" style="color: #000"><i class="fa fa-comment col-xs-offset-8"></i></a>
                            <span style="color: #0c5460"> ( {{$post->comments->count()}} )</span>
                            <hr>

    </div>
       <div id='coments' class='col-xs-offset-1'>
                            @foreach($post->comments as $comment)
                                    <div id="comment1">
                                        <div id='head' class='col-xs-12'>
                                                   <a href="" class="col-lg-2">
                                                <h5 class="text-primary" style="font-size: 17px;">{{$comment->owner}}</h5></a>
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
     @endif
    @endforeach

            </div>

            
            
           <div id="details" class="col-lg-2 col-lg-offset-1" style="border-left: 2px double #333;">
              @foreach(App\craft::authimage() as $img)
                    <img style="" src="{{asset("img/".$img->picture)}}" width='150px' height='150px'>
                    @endforeach
                    <div class="col-lg-12">
                        <form action="{{route('storeimage',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}
                            <input type="file" id="changeimage" name="userimage" title="add or change picture of profile" class="btn-lg col-lg-8"
                                   style="background-color: rgba(29,29,29,0.64);margin-top:5px; margin-bottom:10px;font-size: 7.1px;
                                            border-radius: 4px 0px 0px 4px;">
                            <button type="submit"  title="save image" class=" btn btn-success btn-md col-lg-4"
                                    style="margin-top:5px;margin-bottom:10px;border-radius:0px 4px 4px 0px;text-align:center">save</button>
                        </form>
                    </div>
                     <h3 style="margin-left: 10px;color: #5b5b5b;"><i class="fa fa-user"></i>{{Auth::user()->name}} </h3>
                    <h3 style="margin-left: 10px;color: #5b5b5b;"><i class="fa fa-home"></i>{{Auth::user()->address}} </h3>
                    <h3 style="margin-left: 10px;color: #5b5b5b;"><i class="fa fa-calendar"></i>{{Auth::user()->birthdate}}</h3>
                    <h3 style="margin-left: 10px;color: #5b5b5b;">{{Auth::user()->purpose}}</h3>
                    <h3 style="margin-left: 10px;color: #5b5b5b;"><i class="fa fa-envelope"></i>{{Auth::user()->email}}</h3>
              
                  </div>

        </div>
    </section>

@endsection