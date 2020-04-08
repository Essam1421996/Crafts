@extends('crafts.master2')
@section('container')
    <!-- start content -->
    <section id="Me">
        <div class="container">
            
                <form action="../{{$comment->id}}/updatecomment" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div id="write" class="col-lg-6 col-lg-offset-3 col-xs-10 col-xs-offset-1">
                        <input name="content" value="{{ $comment->content }}" rows="20" class="col-xs-12 btn-lg" style="border: none;">
                        <button type="submit" class="btn btn-success btn-lg" style="margin-top: 5px;">Save</button>
                        <a href="../" class="btn btn-danger btn-lg pull-right" style="margin-top: 5px;">Cancel</a>
                    </div>
                </form>
            </div>
       
    </section>
    <!-- end content -->
@endsection
