
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
                    <div class="col-sm-1"></div>
                     <div class="col-sm-10">
                   
                      <form action="#" class="form-horizontal" method="post" enctype="multipart/form-data">

                          <div class="form-group ">     
                              <label class="control-label">Title</label>
                              <input type="text" name="title" class="form-control" placeholder="Title">  
                          </div>
                          <div class="form-group">
                          <label class="control-label">Body</label>
                              <textarea class="form-control" name="body" rows="5" placeholder="Write here..."></textarea>
                             
                          </div>
                          <div class="form-group">
                          	<input type="file" name="file" class="form-control" accept=".doc,.ppt,.jpeg,.png,.jpg,">	 
                          </div>
                          <div class="form-group">
                          	 <a type="button" class="btn btn-lg btn-primary pull-right">Post</a>	
                          </div>
                          </form>
                      </div>
                     </div>
                   <div class="col-sm-1"></div>
                
                  </div>
                 </div>
       

        </div>
        <div class="col-sm-3">

                <div class="row">
                       <div class="col-sm-12">
                                 <div class="right_sidebar">
                                <!-- Sidebar -->
                                    <div class="w3-sidebar w3-bar-block w3-card-2" style="width:18%;right:0;padding-top: 0px;">
                                   <!--   <a href="{{url('/create')}}" class="create_group_button">Create new group</a> -->
                                      <a href="{{ route('createPost',['id'=>$group->id]) }}" class="w3-bar-item w3-button">Create a Post </a>
                                      <a href="#" class="w3-bar-item w3-button">Upload file</a>
                                      <a href="#" class="w3-bar-item w3-button">Assignment</a>
                                    </div>
                                </div>



                            </div>
                     </div>
                </div>
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
