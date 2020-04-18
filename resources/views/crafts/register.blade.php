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
             
                <!-- Indicators -->
                
                <!-- Wrapper for slides -->
                <div class="carousel-inner" >
                <img class="img-responsive center-block" src="../img/1.jpg" alt="pic1" >
                    <div class="carousel-caption " style="top:15px;">
                    <div ><h1>Register</h1></div>

                
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                           <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required >

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                             
                              <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required >

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                       <label for="birthdate" class="col-md-4 control-label">birthdate</label>
                         <div class="col-md-6">
                         <input type="date" class="form-control" name="birthdate" required placeholder="Birthdate">
                                @if ($errors->has('birthdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                             </div>
                          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required >

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                @if($userscount>0)
                          <div class="form-group{{ $errors->has('purpose') ? ' has-error' : '' }}">
                            <label for="purpose" class="col-md-4 control-label">purpose</label>

                            <div class="col-md-6">
                                <select name="purpose" class="form-control">
                                    <option  selected>Purpose...</option>
                                    <option value="craftsman">Craftsman</option>
                                    <option value="customer">Customer</option>
                                </select>
                                @if ($errors->has('purpose'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('purpose') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                   
                            @else
                             <label for="purpose" class="col-md-4 control-label">purpose</label>
                             <div class="col-md-6">
                             <select name="purpose" class="form-control">
                                    <option value="admin"  selected>Admin</option>
                            </select>

                               </div>
                               
                               @endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
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

      