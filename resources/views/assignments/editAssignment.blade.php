
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
                          Edit an Assignment
                            </div>
                            <div class="panel-body">
                     <div class="col-sm-1">
                       
                     </div>
                     <div class="col-sm-10">
                     
                               <form action="{{route('updatePost',['gid'=>$group->id,'pid' =>$post->id, 'type'=>'A'])}}" method="POST" enctype="multipart/form-data">
                                      {{ csrf_field() }}
                                      {{ method_field('PATCH') }}      
                                          
                                            <input type="hidden" name="gid" value="{{$group->id}}" >
                                      <div class="form-group @if ($errors->has('title')) has-error @endif">     
                                           <label class="control-label">Assignment Title</label>
                                           <input type="text" name="title" class="form-control" value="{{$post->title}}" required>  
                                           
                                           {!!$errors->first('assignment_title','<span class="help-block">:message</span>')!!}
                                     </div>
                                     <div class="form-group ">
                                            <label class="control-label">Body(optional)</label>
                                            <textarea class="form-control" name="body" rows="5" >{{$post->body}}</textarea>
                                            
                                     </div>
                                     <div class="form-group ">
                                           <label class="control-label">File(optional)</label>
                                        	 <input type="file" name="file" class="form-control" accept=".doc,.ppt,.pdf,.jpeg,.png,.jpg," value="">	
                                            
                                     </div>
                                     <div class="form-group">
                                           <label class="control-label">Last date</label>
                                           <input type="date" name="last_date" class="form-control" value="{{$post->assignment->last_submit_date}}" required>  
                                     </div>
                                     <div class="form-group">
                              	          <button type="submit" class="btn btn-lg btn-success pull-right">Update Assignment</button>	
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
