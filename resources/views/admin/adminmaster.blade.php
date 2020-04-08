<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crafts</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/skins/_all-skins.min.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/morris.js/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/crafts/afterlogin.css')}}"/>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- HEADER -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="notifmessage">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">5</span>
                            </a>
                            <ul class="dropdown-menu" id="messagemenu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" id="adminnotif" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                @if($notifcount>0)
                                    <span class="label label-warning">{{$notifcount}}</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu" id="notifmenu">
                                <li class="header">You have {{$notifcount}} new notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            @foreach($notifaction as $notf)
                                                <a href="#">
                                                    <p style="padding: 5px"><i class="fa fa-warning text-yellow"></i> {{$notf->content}} <button type="submit" style="border: none;background-color: #ffffff;" title="mark as read">
                                                            <a href="salfnyadmin/{{$notf->id}}/asread"><i class="fa fa-check-circle-o" style="color: #3e5556; font-size: 15px;"></i></a>
                                                        </button> <i class="fa fa-clock-o" style="color: #3e5556; font-size: 15px;"> {{ $notf->time }}</i></p>
                                                </a>
                                            @endforeach
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="out">
                              
                                <span class="hidden-xs">{{ Auth::user()->name }} <span class="caret"></span></span>
                            </a>
                            <ul class="dropdown-menu" id="outmenu">    
                                <!-- User image -->
                                <li class="user-header">
                                    <p>
                                    <h4 style="color: #F6F7F8">{{ Auth::user()->name }}</h4>
                                    <small style="color: #e7edb4">Member since {{ Auth::user()->created_at }}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ asset('/crafts/afterlogin/') }}" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a class=" btn btn-default btn-flat" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    @yield('header')
    <!-- section -->
    <div class="section">
        <!-- container -->
    @yield('container')
    <!-- /container -->
    </div>
        <p class="col-lg-offset-5" style="color: #fff;margin-top: 5px;">Copy right &copy 2020 </p>
    <!-- /section -->

    <!-- FOOTER -->
    <!-- /FOOTER -->
    </div>
    @yield('js')
</body>
</html>
