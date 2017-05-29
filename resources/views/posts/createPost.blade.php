
@extends('layouts.homeLayout')

@section('group_heading')
              <h2 class="page-header">
                   <a href="{{ route('id',['id' => $group->id]) }}">{{ $group->group_name }}</a>
                   <small></small>
             </h2>
@endsection
@section('group_body')


<section>
    <div class="row">
        <div class="col-sm-9">
              <div class="row">
                 <div class="panel panel-primary">
                    <div class="panel-heading">
                     Create a Post
                    </div>
                    
                    <div class="panel-body">
                       <div class="col-sm-10 col-sm-offset-1">
                              <form action="{{ route('storePost',['gid' => $group->id])}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                   {{ csrf_field() }}                              
                                    <div class="form-group @if($errors->has('body')) has-error @endif">
                                          <label class="control-label">Body</label>
                                          <textarea class="form-control" name="body" rows="5" placeholder="Write here...">{{old('body')}}</textarea>
                                          {!! $errors->first('body','<span class="help-block">:message </span>') !!}
                                    </div>
                                    <div class="form-group">
                                          <label class="control-label">File</label>
                                  	      <input type="file" name="file" class="form-control" accept=".doc,.ppt,.pdf,.jpeg,.png,.jpg," value="{{old('file')}}">	 
                                    </div>
                                  <div class="form-group">
                                  	 <button type="submit" class="btn btn-md btn-success pull-right">Post</button>	   
                                  </div>
                              </form>
                        </div>
                     </div>
                 </div>
           </div>
        </div>
        <div class="col-sm-3">
                   @include('layouts.rightsidebar') <!--this page is extended from layouts -->
        </div>
  </div>


</section>

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
