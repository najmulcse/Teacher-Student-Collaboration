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
        @foreach ($posts as $post)
              <div class="row">
                  
                       <div class="col-sm-2">
                          <figure>
                            <img class="img-responsive" src="img/author.jpg">
                          </figure>
                          <label>{{ $user->name }}</label>
                       </div>
                       <div class="col-sm-10">
                        <span><small>date:{{ $post->created_at->diffForHumans() }}
                                            </small>
                                    <div>
                                    
                                         <p>{{ $post->body }}</p>
                                    </div>
                        
                       </div>
                      
                   
                </div>
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
                                        <a href="{{route('createPost',['gid' =>$group->id])}}" class="w3-bar-item w3-button">Create a post</a>
                                          <a href="#" class="w3-bar-item w3-button">All Posts</a>
                                          <a href="{{ route('createLecture',['id'=>$group->id]) }}" class="w3-bar-item w3-button">Lecture Upload </a>
                                          <a href="#" class="w3-bar-item w3-button">All Lectures</a>
                                          <a href="#" class="w3-bar-item w3-button">Assignment Upload</a>

                                    @elseif( $user->user_type_id == 2 || $user-> user_type_id == 1)
                                          <a href="{{route('createPost',['gid' =>$group->id])}}" class="w3-bar-item w3-button">Create a post</a>
                                          <a href="#" class="w3-bar-item w3-button">All Posts</a>
                                          <a href="#" class="w3-bar-item w3-button">All Lectures</a>
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
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
@endsection


