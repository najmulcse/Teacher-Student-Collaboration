@extends('layouts.homeLayout')

@section('group_heading')
              <h2 class="page-header">
                   <a href="{{ route('id',['id' => $group->id]) }}">{{ $group->group_name }}</a> 
                   <small> >>Assignment Submission </small>
             </h2>
@endsection
@section('group_body')

    <div class="row">
        <div class="col-sm-9">
            <div class="row">
                <small>    <!--For alert message -->
                     @if (session('status'))
                         <div class="alert alert-danger text-center alrert_message" >
                             {{ session('status') }}
                         </div>
                     @endif
                </small>   <!--For alert message end-->
              <form class="horizontal" method="POST" action="{{route('submitByStudent')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="gid" value="{{$group->id}}">
                    <div class="form-group col-sm-3">
                      <label class="label-control">Assignment Title</label>
                    </div>
                    <div class="form-group col-sm-9 @if( $errors->has('assignment_title')) has-error  @endif" >
                          <select class="form-control" name="assignment_title" >    
                                     <option value="">Select Assignment</option>
                              @foreach( $assignments as $assignment)
                                  @if($type=='D'&& $pid==$assignment->id)
                                      <option value="{{$assignment->id}}" selected>{{$assignment->title}}</option>
                                  @else
                                      <option value="{{$assignment->id}}" class="form-control">{{$assignment->title}} </option>
                                  @endif
                              @endforeach
                          </select>
                          {!!$errors->first('assignment_title','<span class="help-block">:message</span>')!!}  
                    </div>        
                    <div class="form-group col-sm-3">
                          <label class="label-control">File</label>
                    </div>
                    <div class="form-group col-sm-9 @if($errors->has('file')) has-error @endif">
                          <input class="form-control" type="file" name="file" value="{{old('file')}}">
                       {!! $errors->first('file','<span class="help-block"> :message </span>')!!}
                    </div>

                    <div class="col-sm-9 col-sm-offset-3">
                          <button class="form-control btn btn-success">Submit</button>
                    </div>
              </form>
            </div>
        </div>
        <div class="col-sm-3">

                 @include('layouts.rightsidebar') <!--this page is extended from layouts -->
       </div>
   </div>

</div>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
@endsection


