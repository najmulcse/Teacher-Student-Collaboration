@extends('layouts.homeLayout')


@section('group_body')


<section>
  

    <div class="row">
        <div class="col-sm-9">
            <h2>Lecture 1 posted </h2>
            <span> <label>date:01-03-2017</label>
            </span>
        </div>
        
        <div class="col-sm-3">
                <div>
                        <a href="{{url('/create')}}" class="create_group_button">Create new group</a>
                    
                 </div>   
                <div class="row">
                       <div class="col-sm-12">
                                 <div class="right_sidebar">                         
                                <!-- Sidebar -->
                                    <div class="w3-sidebar w3-bar-block w3-card-2" style="width:18%;right:0;padding-top: 0px;">
                                   <!--   <a href="{{url('/create')}}" class="create_group_button">Create new group</a> -->
                                      <a href="#" class="w3-bar-item w3-button">Create a Post </a>
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
