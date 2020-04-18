@extends('crafts.master2')
@section('container')
<div class="about">
  <div class="container">
    <section class="title-section">
      <h1 class="title-header" style="text-align:center;">All Groups</h1>
    </section>
  </div>
</div>
 <section id="Me">
<div class="container">
 <div class="row" >
@foreach($groups as $group)
 
    <div class="col-md-4 col-sm-6 col-xs-12 service_box" ><i class="fa fa-group fa-3x pull-left" id="group-icon" ></i>
    <a href="{{route('crafts',$group->id)}}" style="text-decoration:none;"><h2 style="">{{$group->name}}</h2></a>
       </div>
     
    @endforeach
    </div>

    @if(Auth::user()->purpose=="craftsman")
    <form method="post" class="form-horizontal" action="{{route('add_group')}}">
         {{ csrf_field() }}
      	<input type="text" class=" input-lg " placeholder="Enter name of your Group" name="group_name">
        <button  class="btn btn-success " type="submit" >Add</button>
    </form>
@endif
</div>
</section>
  

@endsection