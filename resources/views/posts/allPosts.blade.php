@extends('layouts.homeLayout')

@section('group_heading')
              <h2 class="page-header">
                   <a href="{{ route('id',['id' => $group->id]) }}">{{ $group->group_name }}</a> 
                    <small> >>All posts </small>
             </h2>
@endsection
@section('group_body')


<section>



    <div class="row">
        <div class="col-sm-9">
        @foreach ($posts as $post)
              <div class="row">
                  
                       <div class="col-sm-1">
                          <figure>
                            <img class="img-responsive" src="{{asset('img/author.jpg')}}">
                          
                          <label>{{ $post->user->where('id',$post->user_id)->first()->name }}</label>
                          </figure>
                       </div>
                       <div class="col-sm-11">

                       @if( ( ($post->type)=='P') && ($user->id == $post->user_id))
                            <div class="pull-right">
                                    <ul class="nav navbar-nav navbar-right">
                                         <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                           <span class=""><i class="fa fa-cog"></i></span>
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                                        <li><a href="{{ route('edit_post',['gid'=>$group->id,'pid' =>$post->id, 'type'=>'P']) }}"><i class="fa fa-pencil fa-fw"></i>Edit</a></li>
                                                        <a class="btn btn-info" data-toggle="modal" href='#{{$post->id}}'> <i class="fa fa-trash-o fa-fw"></i>Delete</a>

                                                       <!--  <li><a onclick="return confirm('are you sure?')" href="{{ route('post_deleted',['gid' => $group->id,'pid'=>$post->id ]) }}"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>  -->    
                                                </ul>
                                          </li>
                                    </ul>
                              </div>
                          @endif
                        <small>date:{{ $post->created_at->diffForHumans() }}
                                            </small>
                                    <div>
                                    
                                         <p>{{ $post->body }}</p>
                                         <div>
                                          @if($contents=$post->contents->where('post_id',$post->id))
                                                @foreach($contents as $content)
                                                
                                                   <a  href="{{url('download')}}/{{$content->id}}">{{$content->content}} </a>
                                                @endforeach
                                          @endif
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-sm-1">
                                               <img class="img-responsive" src="{{asset('img/author.jpg')}}">
                                                 <label>{{ $post->user->where('id',$post->user_id)->first()->name }}</label>
                                          </div>
                                           <div class="col-sm-9">
                                              <form action="" method="POST" role="form">
                                              
                                                <div class="form-group">

                                                  <textarea type="text" class="form-control" id="" rows="5" placeholder="Write a comment"></textarea>
                                                </div>
                                              
                                                <button type="submit" class="btn btn-sm btn-primary">Comment</button>
                                              </form>
                                          </div>
                                          <div class="col-sm-2">
                                            
                                          </div>
                                    </div>
                        
                       </div>
                      
                 
                </div>
               <hr>

          <!--modal started here -->

            
            <div class="modal fade" id="{{$post->id}}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                  </div>
                  <div class="modal-body">
                    {{$post->id}} {{$group->id}}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger" id="confirm"  onclick=deletePost({{$post->id}},{{$group->id}})>Ok</button>
                  </div>
                </div>
              </div>
            </div>

          <!-- modal ended -->


          @endforeach

        </div>
        <div class="col-sm-3">

                <div class="row">
                       <div class="col-sm-12">
                                 <div class="right_sidebar">
                                <!-- Sidebar -->
                                    <div class="w3-sidebar w3-bar-block w3-card-2" style="width:18%;right:0;padding-top: 0px;">
                                   <!--   <a href="{{url('/create')}}" class="create_group_button">Create new group</a> -->
                                 
                                    @if( $user-> user_type_id == 1 && $user->id == $group->user_id)
                                        <a href="{{route('createPost',['gid' => $group->id])}}" class="w3-bar-item w3-button">Create a post</a>
                                          <a href="{{ route('allPosts',['gid' => $group->id])}}" class="w3-bar-item w3-button">All Posts</a>
                                          <a href="{{ route('createLecture',['id'=>$group->id]) }}" class="w3-bar-item w3-button">Lecture Upload </a>
                                          <a href="{{ route('allLectures',['gid'=>$group->id ]) }}" class="w3-bar-item w3-button">All Lectures</a>
                                          <a href="#" class="w3-bar-item w3-button">Assignment Upload</a>

                                    @elseif( $user->user_type_id == 2 || $user-> user_type_id == 1)
                                          <a href="{{route('createPost',['gid' =>$group->id])}}" class="w3-bar-item w3-button">Create a post</a>
                                          <a href="{{ route('allPosts',['gid' => $group->id])}}" class="w3-bar-item w3-button">All Posts</a>
                                         <a href="{{ route('allLectures',['gid'=>$group->id ]) }}" class="w3-bar-item w3-button">All Lectures</a>
                                    @endif



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


function deletePost($pid,$gid) {

 
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("demo").innerHTML = this.responseText;
    }
  };  
      xmlhttp.open("GET", 'group/{$gid}/post/{$pid}/delete', true);
      xmlhttp.send();

  // $.ajax({
  //       type: "POST",
  //       url: '.post_deleted',
  //       data:'post_deleted'+$gid,
  //        success: function(response){ // What to do if we succeed
  //             if(data == "success")
  //              alert(response); 
  //              }
  //   })
}



function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
@endsection


