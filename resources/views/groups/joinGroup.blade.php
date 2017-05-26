@extends('layouts.homeLayout')
@section('title')

    <title> TS | Home</title>

@endsection
@section('group_heading')
              <h2 class="page-header">
                    Join Group
                    
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
                                <div class="col-sm-6 col-sm-offset-3 ">
                                       <small>                             <!--For alert message -->
                                            @if (session('status'))
                                                <div class="alert alert-danger text-center">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                       </small>                           <!--For alert message end-->
                        
                                      <form action="{{ url('/checkGroup')}}" method="post" class="form-horizontal" >
                                           {{ csrf_field() }}
                                            <div class="form-group @if($errors->has('group_code')) has-error @endif">
                                                  <label for="exampleInputEmail1" class=" control-label">Group Code</label>
                                                 
                                                  <input type="text" name="group_code" class="form-control" placeholder="Enter a valid group code">
                                                  {!! $errors->first('group_code','<span class="help-block">:message </span>') !!}
                                            </div>
                                             <div class="form-group">
                                                    <button  type="submit" class="btn btn-success form-control" name="add_content">Join group</button>
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





                            