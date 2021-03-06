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
                <li>
                    <a href="{{ asset('/crafts/afterlogin/admin/users') }}">
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
               
                <li class="active">
                    <a href="#">
                        <i class="fa  fa-pencil"></i><span>Posts</span>
                        <span class="pull-right-container"><span class="label label-danger pull-right">{{$postcount}}</span></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-comments-o"></i><span>Comments</span>
                        <span class="pull-right-container"><span class="label label-danger pull-right">{{$commentcount}}</span></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-envelope-o"></i><span>Messages</span>
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
        <!-- Content -->

        <!-- Users -->
        <div class="col-md-12" style="margin-top: -30px;">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">All Posts</h3>
                </div>
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                        @foreach($postwork as $post)
                            <li>
                                <h4 class="text-danger">Owner: <span class="text-info">{{$post->owner_name}}</span></h4>
                                <h4 class="text-danger">Content: <span class="text-info" style="padding: 1px;border-radius: 2px;">
                                        {{$post->content}}</span></h4>
                                <h4 class="text-danger">Add At: <span class="text-info">{{$post->created_at}}</span></h4>
                                <h4 class="text-danger">Comments number: <span class="text-info">{{$post->comments()->count()}}</span></h4>
                                <h4 class="text-danger">Likes number: <span class="text-info">{{$post->likes()->count()}}</span></h4>
                                <th>
                                    <button href="#" class="btn btn-info" ><span class="fa fa-comment-o"> Contact Owner</span></button>
                                    <form action="{{$post->id}}/postdestroy" method="post" style="display: inline;">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                        <button type="submit" class="btn btn-danger"><span class="fa fa-trash"> Delete</span></button>
                                    </form>
                                </th>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!--/.box -->
        </div>
        <!-- /Content -->
    </div>
    <!-- /.content-wrapper -->
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