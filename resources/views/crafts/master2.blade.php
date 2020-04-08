<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Crafts</title>
 <link rel="stylesheet" href="{{asset('fonts/crafts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="{{asset('css/crafts/bootstrap.css')}}" />
        <link href="{{asset('css/crafts/style.css')}}" rel="stylesheet" />


        <link type="text/css" rel="stylesheet" href="{{asset('css/crafts/hover.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{asset('css/crafts/animate.css')}}" />

        <link type="text/css" rel="stylesheet" href="{{asset('css/crafts/afterlogin.css')}}"/>
        <!-- write post -->
        
        </head>


 <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"/>
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ asset('/') }}" id="logo"><h1><b>C</b>rafts</h1></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                @foreach(App\craft::authimage() as $img)
                    <li><a href="#"><img style="margin: -10px;margin-top: -2px;" src="{{asset('img/'.$img->picture)}}" class="img-circle" width='50px' height='50px'></a></li>
                    @endforeach
                    <li><h3 style="color: #ffffff;margin: 25px;">{{ Auth::user()->name }}</h3></li>
                    <li><a href="{{asset('crafts/afterlogin')}}" title="back to your home page"><i class="fa fa-home fa-3x"></i></a></li>
                    <li><a href="{{asset('crafts/afterlogin/user_profile')}}" title="see your page"><i class="fa fa-user-circle-o fa-3x"></i></a></li>
                     <li><a href="{{asset('crafts/afterlogin/groups')}}" title="All crafts"><i class="fa fa-handshake-o fa-3x"></i></a></li>

                    <li><a id="showchatnotif" href="#" title="see your chat"> <i class="fa fa-comments-o fa-3x"></i>
                         @if(App\craft::notifchatcount()>0)
                                    <span style="position: absolute;right: 0px;top: 15px;width: 25px;height: 25px;padding-top: 1.5px;
                    text-align: center;font-size: 18px;background: #f84f1e;color: #FFF;border-radius: 50%;">{{App\craft::notifchatcount()}}</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu" id="chatnotif" style="padding: 5px;">
                                <li class="text-center">You have {{App\craft::notifchatcount()}} new messages</li>
                                <hr>
                                @foreach(App\craft::notifchat() as $notf)
                                    <span class="text-primary">{{ $notf->content }}</span>
                                    <p></p>
                                    <i class="fa fa-clock-o" style="color: #3e5556; font-size: 20px;"> {{ $notf->time }}</i>
                                    
                                    <a href="{{route('asreadchat',$notf->id)}}" style="border: none;background-color: #ffffff;" title="mark as read" class="pull-right"><i class="fa fa-check-circle-o" style="color: #3e5556; font-size: 20px;"></i></a>
                        
                                   
                                    <hr>
                                @endforeach
                                <li class="text-center"><a href="{{ asset('/crafts/afterlogin/chat') }}">View all</a></li>
                            </ul>
                        </li>
                    
                    <li style="margin-left: 5px;"><a href="#" id="shownotifications" title="see your notifications" data-toggle="dropdown"><i class="fa fa-bell-o fa-3x"></i>




                           @if(App\craft::notifcount()>0)
                            <span style="position: absolute;right: 0px;top: 15px;width: 25px;height: 25px;padding-top: 1.5px;
                            text-align: center;font-size: 18px;background: #f84f1e;color: #FFF;border-radius: 50%;">{{App\craft::notifcount()}}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu" id="notifs" style="padding: 5px;">
                            <li class="text-center">You have {{App\craft::notifcount()}} new notifications</li>
                            <hr>
                            @foreach(App\craft::notifaction() as $notf)
                                <span class="text-primary">{{ $notf->content }}</span>
                                <p></p>
                                <i class="fa fa-clock-o" style="color: #3e5556; font-size: 20px;"> {{ $notf->time }}</i>
                               
                                  <a href="{{route('asread',$notf->id)}}" style="border: none;background-color: #ffffff;" title="mark as read" class="pull-right"><i class="fa fa-check-circle-o" style="color: #3e5556; font-size: 20px;"></i></a>

                               
                                <hr>
                            @endforeach
                            <li class="text-center"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="fa fa-sign-out fa-3x"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             {{ csrf_field() }}

                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   

@yield('container')


<div class="footer">
  <div class="footer_bottom">
    <div style="font-size:40px;"> <a class="fa fa-facebook social-icon" href="#" style="width:55px;"></a> <a class="fa fa-twitter social-icon" href="#" style="width:55px;"></a> 
    <a class="fa fa-linkedin social-icon" href="#" style="width:55px;"></a> <a class="fa fa-google-plus social-icon" href="#" style="width:55px;"></a> </div>
    <div class="copy">
      <p>Copyright &copy; 2020 </p>
    </div>
  </div>
</div>

</body>

        <script type="text/javascript" src="{{asset('js/crafts/jquery-3.2.1.min.js')}}"></script>
        <script  type="text/javascript" src="{{asset('js/crafts/bootstrap.js')}}"></script>
        <script  type="text/javascript" src="{{asset('js/crafts/wow.min.js')}}"></script>
         <script  type="text/javascript" src="{{asset('js/crafts/bootstrap.min.js')}}"></script>
        <script  type="text/javascript" src="{{asset('js/crafts/index.js')}}"></script>
        <script  type="text/javascript" src="{{asset('js/crafts/afterlogin.js')}}"></script>
                

</html>
