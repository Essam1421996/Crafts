<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width , initial-scale=1" >
        <title>crafts</title>
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/normalize.css')}}" rel="stylesheet" type="text/css")>
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet"  type="text/css">
        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/media.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/hover.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/animate.css')}}" rel="stylesheet" type="text/css">
         <link href="{{asset('css/jquery.fancybox.min.css')}}" rel="stylesheet" type="text/css">
        
    </head>
    <body>
         <!-- Navbar -->
         @yield('header')
              
        @yield('content')
           
        
           
        @include('crafts.footer');
        @yield('js')
         
    </body>
</html>