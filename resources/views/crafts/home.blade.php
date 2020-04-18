    @extends('crafts.master')
    @section('header')
            <nav class="navbar navbar-inverse navbar-fixed-top" style="" role="navigation">
            <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class= "navbar-brand hvr-pulse" id="brand-content" href="/"><b class="first-letter-brand">C</b>rafts</a>
            </div>
            <div class="collapse navbar-collapse" id="mynav">
                <ul class="nav navbar-nav navbar-right" >
                    <li class="active"> <a href="/">Home </a>  </li>
                    
                     <li> <a href="#">Contact Us</a> </li>
                </ul>
              </div>
              </div>
              </nav>

 
         <!-- Navbar ending -->
          <!-- static carousel -->
             
       <div id="carousel-example-generic" class="carousel slide " data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators  ">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                </ol>
              
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox" class="row">
                  <div class="item active" >
                    <img class="img-responsive center-block" src="../img/slide3.jpg" alt="pic1" >
                    <div class="carousel-caption ">
                         
                      
                        <a href=" {{asset('crafts/login')}}"  data-src="#modal_sign"><button class="btn btn-primary">Sign In</button></a>
                        <a  href="{{asset('crafts/register')}}"  data-src="#modal" ><button class="btn btn-danger">Rigester</button></a>
                    </div>
                  </div>
                  <div class="item" >
                   <img class="img-responsive center-block" src="../img/clinic.jpg" alt="pic2"  >
                    <div class="carousel-caption ">
                     
                    <a href=" {{asset('crafts/login')}}"  data-src="#modal_sign"><button class="btn btn-primary">Sign In</button></a>
                    <a  href="{{asset('crafts/register')}}"  data-src="#modal" ><button class="btn btn-danger">Rigester</button></a>
                    </div>
                  </div>
                  <div class="item" >
                   <img class="img-responsive center-block" src="../img/slide2.jpg" alt="pic2"  >
                    <div class="carousel-caption ">
                    <a href=" {{asset('crafts/login')}}"  data-src="#modal_sign"><button class="btn btn-primary">Sign In</button></a>
                    <a  href="{{asset('crafts/register')}}"  data-src="#modal" ><button class="btn btn-danger">Rigester</button></a>
                    </div>
                  </div>
                  <div class="item" >
                   <img class="img-responsive center-block" src="../img/slide1.jpg" alt="pic2">
                    <div class="carousel-caption ">
                    <a href=" {{asset('crafts/login')}}"  data-src="#modal_sign"><button class="btn btn-primary">Sign In</button></a>
                    <a  href="{{asset('crafts/register')}}"  data-src="#modal" ><button class="btn btn-danger">Rigester</button></a>
                    </div>
                  </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
 
    @endsection
    @section('content')
       @endsection
       