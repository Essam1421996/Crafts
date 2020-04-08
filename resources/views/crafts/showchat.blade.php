@extends('crafts.master2')
@section('container')
    <!-- start content -->
    <section id="Me">
        <div class="container" style="background-color: #222222; border-radius: 10px;border: 2px solid #5cb85c;">
            <div class="col-lg-8" style="overflow: auto; border-right: 2px solid #5cb85c;padding: 15px;background-color: #fff;height: 500px;margin-left: -15px;border-radius: 10px 0px 0px 0px;">
                @foreach($userimage as $img)
                @if($user->id==$img->user_id)
                <img style="margin: 2px;" src="{{asset("img/".$img->picture)}}"
                     class="img-circle col-lg-3" width='50px' height='50px'>
                     @endif
                     @endforeach

                <h3 class="text-center text-success">{{$user->name}}</h3>
                <hr>
                <br>
                @foreach($chats as $chat)
                    @if($chat->sender == $user->name or $chat->reciever == $user->name)
                        @if($chat->sender == Auth::user()->name)
                            <h3 class="col-lg-7" style="background: #5cb85c;color:#fff ;padding: 10px;border-radius: 8px;">
                                {{$chat->content}}</h3><h5 class="col-lg-1" style="color:#a5a5a5 ;padding: 10px;">{{$chat->time}}</h5>
                        @endif
                            @if($chat->sender == $user->name)
                                <h5 class="col-lg-1 col-lg-offset-4" style="color:#a5a5a5 ;padding: 10px;margin-right: 10px">{{$chat->time}}</h5>
                                <h3 class="col-lg-6 " style="background: #ccc;color:#000 ;padding: 10px;border-radius: 8px;">
                                    {{$chat->content}}</h3>
                            @endif
                    @endif
                @endforeach
            </div>
            <div class="col-lg-4" style="overflow: auto;padding: 15px;height: 500px;">
                
                    @foreach(App\craft::authimage() as $img)
                        <img style="margin: 2px;" src="{{asset("img/".$img->picture)}}"
                                             class="img-circle col-lg-3" width='50px' height='50px'>
                    @endforeach
                    
                <h3 style="color: #ffffff; margin-top: -1px;" class="col-lg-5">{{ Auth::user()->name }}</h3>
                <h5 style="color: #ffffff; margin-top: -20px;" class="col-lg-5 col-lg-offset-4"><i class="fa fa-circle text-success"></i> online</h5>
                    <hr class="col-lg-11">
                @foreach($users as $use)
                        @foreach($imageall as $img)
                            @if($use->id == $img->user_id)
                                <img style="margin-top: 12px; padding: 4px;" src="{{asset("img/".$img->picture)}}"
                                     class="img-circle col-lg-2" width='40px' height='40px'>
                            @endif
                        @endforeach
                    <h3 class="text-info col-lg-3">{{$use->name}}
                    <h3 class="col-lg-2 col-lg-offset-2"><a href="../../chat/{{$use->id}}/showchat" title="start chat">
                            <i class="fa fa-comments-o text-warning"></i></a></h3>
                            <form action="../{{$use->id}}/destroychat" method="post" style="display: inline;">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <h3 class="col-lg-2"><button type="submit" style="border: none;background-color: #222222;" title="delete this chat">
                                    <i class="fa fa-trash text-danger"></i></button></h3>
                            </form>
                @endforeach
            </div>
            <div class="col-lg-8"  style="border-right: 2px solid #5cb85c;padding: 15px;background-color: #fff;
            margin-left: -15px;border-radius: 0px 0px 0px 10px;">
                <form role="form" method="post" action="../../chat/{{$user->id}}/storemessage" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="form-group ">
                        <button class="btn btn-success input-lg col-lg-1" title="send" style="border-radius: 5px 0px 0px 5px;">
                            <i class="fa fa-paper-plane fa-2x"></i></button>
                        <input type="text" style="border: 2px solid #5cb85c;border-radius: 0px 5px 5px 0px;" value="{{ old('comcont') }}"
                               class=" input-lg col-lg-11" name="message" placeholder="Enter your message..." autocomplete="off" required>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <br>
    <!-- end content -->
@endsection
@section('js')
    <script src="{{asset('js/salfny/afterlogin.js')}}"></script>
@endsection