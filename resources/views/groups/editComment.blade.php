@extends('layouts.homeLayout')
@section('title')

    <title> TS | Home</title>

@endsection
@section('group_heading')
              <h2 class="page-header">
                    Comment Edit
                    
             </h2>
@endsection
@section('group_body')
   
<section>
     <div class="row">
          <div class="col-sm-9">    
                <div class="row">  
                      <div class="panel panel-primary">    
                           <div class="panel-heading">
                              <span> <h2></h2></span>
                           </div> 
                           <div class="panel-body">                                  
                                <div class="col-sm-8 col-sm-offset-2 ">
                                       <small>                             <!--For alert message -->
                                            @if (session('status'))
                                                <div class="alert alert-danger text-center">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                       </small>                           <!--For alert message end-->
                        
                                      <form action="{{route('post_comment_update',['gid' =>$gid ,'pid' =>$pid,'cid'=>$comment->id,'type' =>$type])}}" method="POST" role="form">
                                               {{csrf_field()}}
                                                {{method_field('PATCH')}}
                                                <div class="form-group">

                                                   <textarea type="text" class="form-control"  name="body" id="" rows="7">{{$comment->comment}}</textarea>
                                                  
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-sm btn-primary">Comment</button>
                                                </div>
                                              </form>
                              </div>    
                         </div>                                                 
                    </div>               
               </div> 
        </div>
        <div class="col-sm-3">
        
        </div>
                                                               
    </div>
        

</section>




<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>

@endsection





                            