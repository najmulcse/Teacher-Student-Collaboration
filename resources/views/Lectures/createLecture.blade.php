
@extends('layouts.homeLayout')

@section('group_heading')
              <h2 class="page-header">
                   <a href="{{ route('id',['id' => $group->id]) }}">{{ $group->group_name }}</a>
                   <small></small>
             </h2>
                                
@endsection
@section('group_body')

    <div class="row">
        <div class="col-sm-9">
            <div class="row">
              <div class="panel panel-primary">
               <div class="panel-heading">
                            Create a lecture
                            </div>
                            <div class="panel-body">
                     <div class="col-sm-1">
                       
                     </div>
                     <div class="col-sm-10">
                          
                             
                          
                     
                               <form action="{{route('storeLecture')}}" method="POST" enctype="multipart/form-data">
                                      {{ csrf_field() }}
                                            
                                          
                                            <input type="hidden" name="gid" value="{{$group->id}}" >
                                      <div class="form-group @if ($errors->has('lecture_title')) has-error @endif">     
                                           <label class="control-label">Lecture Title</label>
                                           <input type="text" name="lecture_title" class="form-control" placeholder="Lecture Title" value="{{old('lecture_title')}}">  
                                           
                                           {!!$errors->first('lecture_title','<span class="help-block">:message</span>')!!}
                                     </div>
                                     <div class="form-group @if ($errors->has('body')) has-error @endif">
                                            <label class="control-label">Body</label>
                                            <textarea class="form-control" name="body" rows="5" placeholder="Write here...">{{ old('body') }}</textarea>
                                            {!!$errors->first('body','<span class="help-block">:message</span>')!!}
                                      </div>
                                     <div class="form-group @if ($errors->has('file')) has-error @endif">
                                           <label class="control-label">File</label>
                                        	 <input type="file" name="file" class="form-control" accept=".doc,.ppt,.pdf,.jpeg,.png,.jpg," value="{{ old('file') }}">	
                                            {!!$errors->first('file','<span class=" help-block">:message</span>')!!} 
                                     </div>
                                     <div class="form-group">

                              	          <button type="submit" class="btn btn-lg btn-success pull-right">Upload lecture</button>	
                                    </div>
                           </form>
                             
                      </div>
                     </div>
                     
                   <div class="col-sm-1">
                     
                   </div>
                
                  </div>
                 </div>
       
        </div>
        <div class="col-sm-3">

                 @include('layouts.rightsidebar') <!--this page is extended from layouts -->
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
