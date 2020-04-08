@extends('admin.adminmaster')
@section('header')
@endsection
@section('container')
<!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    @if($userimagecount == 1)
                        @foreach($userimage as $img)
                            <img src="{{asset("img/".$img->picture)}}" class="img-circle" alt="User Image">
                        @endforeach
                    @endif
                    @if($userimagecount == 0)
                        <img src="{{asset("img/m.jpg")}}" class="img-circle" alt="User Image">
                    @endif
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="{{ asset('/crafts/afterlogin/admin') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
                <li class="active">
                    <a href="#">
                        <i class="fa fa-user-o"></i><span>Users</span>
                        <span class="pull-right-container"><span class="label label-primary pull-right">{{$usercount}}</span></span>
                    </a>
                </li>
                <li>
                    <a href="{{ asset('/crafts/afterlogin/admin/crafts') }}">
                        <i class="fa fa-product-hunt"></i><span>Crafts</span>
                        <span class="pull-right-container"><span class="label label-success pull-right">{{$craftcount}}</span></span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ asset('/crafts/afterlogin/admin/posts') }}">
                        <i class="fa  fa-pencil"></i><span>Posts</span>
                        <span class="pull-right-container"><span class="label label-danger pull-right">{{$postcount}}</span></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-comment-o"></i><span>Comments</span>
                        <span class="pull-right-container"><span class="label label-danger pull-right">{{$commentcount}}</span></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-comments-o"></i><span>Messages</span>
                        <span class="pull-right-container"><span class="label label-warning pull-right">new</span></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-question-circle"></i><span>Questions</span>
                        <span class="pull-right-container"><span class="label label-success pull-right">2</span></span>
                    </a>
                </li>
                <li class="header">LABELS</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$craftcount}}</h3>
                            <p>Helping</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-people-outline"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$particpate}}<sup style="font-size: 20px">%</sup></h3>

                            <p>Participation Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$likecount}}</h3>
                            <p>Likes</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-thumbsup"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$usercount}}</h3>

                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </section>
    
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
                
                    @foreach($authimage as $img)
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
    </h3>
    </div></div></section></div>
    @endsection
@section('js')
    <!-- jQuery 3 -->
    <script src="{{asset('AdminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('AdminLTE/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Morris.js charts -->
    <script src="{{asset('AdminLTE/bower_components/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('AdminLTE/bower_components/morris.js/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{asset('AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('AdminLTE/bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{asset('AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{asset('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('AdminLTE/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('AdminLTE/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('AdminLTE/dist/js/demo.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/crafts/afterlogin.js') }}"></script>

@endsection