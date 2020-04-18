<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width , initial-scale=1" >
        <title>crafts</title>
		        <link rel="icon" href="{{asset('/img/craftss.png')}}" type="image/icon">

        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/normalize.css')}}" rel="stylesheet" type="text/css")>
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet"  type="text/css">
        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/hover.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/animate.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/jquery.fancybox.min.css')}}" rel="stylesheet" type="text/css">
        
    </head>
    <body>
         <!-- Navbar -->
         @yield('header')
              
        @yield('content')
           
        
           
        @include('crafts.footer')
         <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
	    <script src="{{asset('js/plugins.js')}}"></script>
        <script src="{{asset('js/wow.min.js')}}"></script>
        <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
        <script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
        <script>new WOW().init();</script>

         
    </body>
</html>