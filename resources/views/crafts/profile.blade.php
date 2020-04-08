 @extends('crafts.master2')
@section('container')

 <section id="Me">
        <div class="container">
         
            <div id="posts" class="col-lg-9 col-xs-12">
            @foreach($posts as $post)
                             <div id='post1' class='col-xs-12'>
                    <div id='head' class='col-xs-12'>
                     
    
    <h3 class="text-primary">{{$post->owner_name}}</h3>
    
     <h3 class="text-primary col-lg-4"><i class="fa fa-clock-o text-danger"></i>
                                        <span class="text-info" style="font-size: 13px;">{{$post->date}}  {{$post->time}}</span></h3>
             </div> 
                      
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
                                            <a href="afterlogin/{{$comment->id}}/editcomment"><i class="fa fa-edit" style="color: #3e5556; font-size: 20px;"></i></a>
                                        </button>
                                        <form action="afterlogin/{{$comment->id}}/destroycomment" method="post" style="display: inline;">
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

            
            
           <div id="details" class="col-lg-2 col-lg-offset-1" style="border-left: 2px double #333;">
              @foreach($user_image as $img)
                    <img style="" src="{{asset("img/".$img->picture)}}" width='150px' height='150px'>
                    @endforeach
                   @foreach($profile as $user)
                     <h3 style="margin-left: 10px;color: #5b5b5b;"><i class="fa fa-user"></i>{{$user->name}} </h3>
                    <h3 style="margin-left: 10px;color: #5b5b5b;"><i class="fa fa-home"></i>{{$user->address}} </h3>
                    <h3 style="margin-left: 10px;color: #5b5b5b;"><i class="fa fa-calendar"></i>{{$user->birthdate}} </h3>
                    <h3 style="margin-left: 10px;color: #5b5b5b;"><i class="fa fa-mobile"></i>{{$user->phone}}  </h3>
                    <h3 style="margin-left: 10px;"><i class="fa fa-envelope"></i>
                            <a href="https://{{$user->email}}" target="_blank" title="send message by mail" style="color: #5b5b5b;">{{ $user->email }}</a></h3>
                        <h3 style="margin: 50px;">
                            <a href="../chat/{{$user->id}}/showchat" title="start chating" style="color: #5b5b5b;"><i class="fa fa-comments fa-2x"></i></a></h3>

              @endforeach
                  </div>

        </div>
    </section>

@endsection