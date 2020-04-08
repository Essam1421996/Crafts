@extends('crafts.master2')
@section('container')
<div class="about">
  <div class="container">
    <section class="title-section">
      <h1 class="title-header" style="text-align:center;">All Crafts of {{$group_name}}</h1>
    </section>
  </div>
</div>
 <section id="Me">
<div class="container">
 
@foreach($crafts as $craft)
<div id="posts" class="col-lg-10 col-lg-offset-1 col-xs-12">
              
                    <div id='post1' class='col-xs-12'>
  <div class="row">
 <div class="col-md-4 service_box">
<a href="{{route('profile',$craft->craftsman_id)}}" target="_blank" class="col-lg-2" style="text-decoration:none">
    <h3 class="text-primary">{{$craft->craftsman_name}}</h3></a>
    <div id='contain' class='col-xs-10 col-xs-offset-1' style="color: #082a38;">
                          
                        
    <h2 style="text-align:center;">{{$craft->name}}</h2>
    </div>
       </div>
    </div>
                               @if($craft->craftsman_id==Auth::user()->id)
                                <button type="submit" style="border: none;background-color: #ffffff; margin: 10px;" title="edit this craft">
                                <a href="../../craftsman/craft/{{$craft->id}}/craftedit"><i class="fa fa-edit fa-2x text-warning pull-left"></i></a>
                            </button>
                            <form action="../../craftsman/craft/{{$craft->id}}/craftdestroy" method="post" style="display: inline;">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <button type="submit" style="border: none;background-color: #ffffff;" title="delete this craft">
                                    <i class="fa fa-3x text-danger fa-trash"></i></button>
                            </form>
                           @endif
    </div>
    </div>
 
    @endforeach
    @if(Auth::user()->purpose=="craftsman")
    <div style="margin-left:350px;">
    <form method="post" class="form-horizontal" action="{{route('add_craft',$id)}}">
         {{ csrf_field() }}

    	<input type="text" placeholder="Craft name..." name="craft_name" class=" input-lg ">
    	<button type="submit" class="btn btn-success " >Add</button>
    </form>
   
    @endif

</div>
  </section>

@endsection