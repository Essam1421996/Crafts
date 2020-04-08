@extends('crafts.master')
@section('header')
            <nav class="navbar navbar-inverse navbar-fixed-top" style="font-size: 15px;font-weight: bold" role="navigation">
            <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class= "navbar-brand hvr-pulse " href="/" style="color: #1abc9c;font-family: fantasy;letter-spacing: 5px;font-size: 25px">C<span class="red"  style="color: red;">rafts</span></a>
            </div>
            <div class="collapse navbar-collapse" id="mynav">
                <ul class="nav navbar-nav navbar-right" >
                    <li class="active"> <a href="/">Home </a>  </li>
                    <li> <a href="About.html">Our Story</a> </li>
                    <li > <a href="faq.html">Our Works</a> </li>
                
                     <li> <a href="#">Our Services</a> </li>
                     <li> <a href="#">Contact Us</a> </li>
                </ul>
              </div>
              </div>
              </nav>

         <!-- Navbar ending -->
          <!-- static carousel -->
             
                <!-- Indicators -->
                
                <!-- Wrapper for slides -->
                <div class="carousel-inner" >
                <img class="img-responsive center-block" src="../img/restuarant.jpg" alt="pic1" style="width:100%" >
                    <div class="carousel-caption " style="top:15px;">
                    <div ><h1>Login</h1></div>

                
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
           
                         
                    </div>
                  </div>
            
                <!-- Controls -->
                
    @endsection
    @section('content')
@endsection

       @section('js')
       <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/plugins.js')}}"></script>
        <script src="{{asset('js/wow.min.js')}}"></script>
        <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
        <script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
        <script>new WOW().init();</script>
       @endsection



                
