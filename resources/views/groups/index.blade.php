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
          @foreach ($lec_posts as $lec_post) <!--all posts/lectures printing foreach loop started -->
              <div class="row">
                
                       <div class="col-sm-1">
                          <figure>
                            <img class="img-responsive" src="{{asset('img/author.jpg')}}">
                          </figure>
                          <label>{{ $lec_post->user->where('id',$lec_post->user_id)->first()->name }}</label>
                       </div>
                       <div class="col-sm-11">
                            <div>
                                        
                                <h2>{{ $lec_post->title }}</h2>
                                @if( ( ($lec_post->type)=='P') && ($user->id == $lec_post->user_id))
                                       <div class="pull-right">
                                           <ul class="nav navbar-nav navbar-right">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                             <span class=""><i class="fa fa-cog"></i></span>
                                                    </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                          <li><a href="{{ route('edit_post',['gid'=>$group->id, 'pid' => $lec_post->id, 'type'=>'P']) }}"><i class="fa fa-pencil fa-fw"></i>Edit</a></li>

                                                          <li><a onclick="return confirm('are you sure?')" href="{{ route('post_deleted',['gid' => $group->id,'pid'=>$lec_post->id ]) }}"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li> 
                                                      
                                                    </ul>
                                                </li>
                                            </ul>
                                       </div>

                                  @elseif( ( ($lec_post->type)=='L') && ($user->id == $lec_post->user_id))
                                      <div class="pull-right">
                                          <ul class="nav navbar-nav navbar-right">
                                                <li class="dropdown">
                                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                           <span class=""><i class="fa fa-cog"></i></span>
                                                      </a>
                                                      <ul class="dropdown-menu" role="menu">
                                                          <li><a href="{{ route('edit_post',['gid'=>$group->id,'pid' => $lec_post->id, 'type'=>'L']) }}"><i class="fa fa-pencil fa-fw"></i>Edit</a></li>

                                                         <li><a onclick="return confirm('are you sure?')" href="{{ route('post_deleted',['gid' => $group->id,'pid'=>$lec_post->id ]) }}"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>  
                                                     </ul>
                                                </li>
                                          </ul>
                                      </div>  
                                  @endif
                                  <span><small>date:{{ $lec_post->created_at->diffForHumans() }}
                                            </small>
                                        </span>
                            </div>
                            <div>
                                   <p>{{ $lec_post->body }}</p>
                                   @if($contents=$lec_post->contents->where('post_id',$lec_post->id))
                                                @foreach($contents as $content)
                                                    <a class="" href="{{url('download')}}/{{$content->id}}">{{$content->content}} </a>
                                                @endforeach
                                          @endif
                            </div>
                            <br>
                          <!--showing all comments in a single post/lecture started  frem here -->
                            @foreach($lec_post->comments as $comment)
                                  <div class="row">    
                                          <div class="col-sm-1">
                                                  <img class="img-responsive" src="{{asset('img/author.jpg')}}">
                                                   <label>{{ $comment->user->name }}</label>
                                          </div>
                                          <div class="col-sm-11">
                                                  <p>{{$comment->comment}}</p>
                                          </div>         
                                  </div>  
                            @endforeach  
                                         
                          <!--for comment submission form started-->
                                 <div class="row">
                                        <div class="col-sm-1">
                                               <img class="img-responsive" src="{{asset('img/author.jpg')}}">
                                                 <label>{{ $user->name }}</label>
                                        </div>
                                        <div class="col-sm-11">
                                              <form action="{{route('post_comment',['gid' =>$group->id ,'pid' =>$lec_post->id,'type' =>'C'])}}" method="POST" role="form">
                                               {{csrf_field()}}
                                                <div class="form-group">

                                                  <textarea type="text" class="form-control"  name="body" id="" rows="3" placeholder="Write a comment"></textarea>
                                                </div>
                                              
                                                <button type="submit" class="btn btn-sm btn-primary">Comment</button>
                                              </form>
                                        </div>
                                  </div>
                                 
                            <!--comment submission form ended-->
                        
                       </div>
                      
                </div>
                <hr>
          @endforeach <!--all posts/lectures printing foreach loop ended -->
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
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
@endsection


