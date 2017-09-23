
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
                            Create an Assignment
                            </div>
                            <div class="panel-body">
                     <div class="col-sm-1">
                       
                     </div>
                     <div class="col-sm-10">
                          
                             
                          
                     
                               <form action="{{route('storeAssignment',['gid'=>$group->id])}}" method="POST" enctype="multipart/form-data">
                                      {{ csrf_field() }}
                                            
                                          
                                            <input type="hidden" name="gid" value="{{$group->id}}" >
                                      <div class="form-group @if ($errors->has('assignment_title')) has-error @endif">     
                                           <label class="control-label">Assignment Title</label>
                                           <input type="text" name="assignment_title" class="form-control" placeholder="Assignment Title" value="{{old('assignment_title')}}">  
                                           
                                           {!!$errors->first('assignment_title','<span class="help-block">:message</span>')!!}
                                     </div>
                                     <div class="form-group ">
                                            <label class="control-label">Body(optional)</label>
                                            <textarea class="form-control" name="body" rows="5" placeholder="Write here...">{{ old('body') }}</textarea>
                                            
                                      </div>
                    
                                      <div class="row">
                                          
                                          <div class="col-sm-12">
                                               <div class="form-group multiple-form-group row" data-max=5>
                                                     <label class="control-label">File(optional)</label>
                                                     <div class="form-group input-group">
                                                  	 <input type="file" name="file[]" class="form-control" accept=".doc,.ppt,.pdf,.jpeg,.JPEG,.png,.jpg," value="{{ old('file') }}">
                                                      <span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
                                                     </button></span>
                                                     </div>
                                                      
                                               </div>
                                         
                                     </div>
                                     <div class="form-group @if ($errors->has('last_date')) has-error @endif">
                                           <label class="control-label">Last date to submit</label>
                                           <input type="date" name="last_date" class="form-control" value="{{ old('last_date') }}">  
                                            {!!$errors->first('last_date','<span class=" help-block">:message</span>')!!} 
                                     </div>

                                     <div class="form-group">

                              	          <button type="submit" class="btn btn-lg btn-success pull-right">Upload Assignment</button>	
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
