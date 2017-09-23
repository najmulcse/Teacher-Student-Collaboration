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
                          @if(!empty($lec_post->user->photo))
                              <img class="img-responsive" src="{{asset('img/'.$lec_post->user->id)}}">
                          @else
                              <img class="img-responsive" src="{{asset('img/backgrounds/default.png')}}">
                          @endif
                          </figure>
                          <label>{{ $lec_post->user->name }}</label>
                       </div>
                       <div class="col-sm-11">
                            <div>
                                        
                                @if( ( ($lec_post->type)=='P') && ($user->id == $lec_post->user_id))
                                       <div class="pull-right">
                                           <ul class="nav navbar-nav navbar-right">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                             <span class=""><i class="fa fa-cog"></i></span>
                                                    </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                          <li><a href="{{ route('edit_post',['gid'=>$group->id, 'pid' => $lec_post->id, 'type'=>'P']) }}"><i class="fa fa-pencil fa-fw"></i>Edit</a></li>

                                                          <li><a onclick="return confirm('are you sure?')" href="{{ route('post_deleted',['gid' => $group->id,'pid'=>$lec_post->id , 'type'=>'P']) }}"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li> 
                                                      
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

                                                         <li><a onclick="return confirm('are you sure?')" href="{{ route('post_deleted',['gid' => $group->id,'pid'=>$lec_post->id , 'type'=>'L']) }}"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>  
                                                     </ul>
                                                </li>
                                          </ul>
                                      </div>  

                                      @elseif( ( ($lec_post->type)=='A') && ($user->id == $lec_post->user_id))
                                          <div class="pull-right">
                                          @if($lec_post->assignment)
                                          <h3 style="color:red ; background-color: #cccccc; padding: 5px; ">Assignment</h3>
                                           <h4 style="color:red ;"><small>Last date : {{$lec_post->assignment->last_submit_date}}</small></h4>
                                           @endif
                                              <ul class="nav navbar-nav navbar-right">
                                                    <li class="dropdown">
                                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                               <span class=""><i class="fa fa-cog"></i></span>
                                                          </a>
                                                          <ul class="dropdown-menu" role="menu">
                                                              <li><a href="{{ route('edit_post',['gid'=>$group->id,'pid' => $lec_post->id, 'type'=>'A']) }}"><i class="fa fa-pencil fa-fw"></i>Edit</a></li>

                                                             <li><a onclick="return confirm('are you sure?')" href="{{ route('post_deleted',['gid' => $group->id,'pid'=>$lec_post->id , 'type'=>'A']) }}"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>  
                                                         </ul>
                                                    </li>
                                              </ul>
                                          </div> 
                                          @elseif( ( $lec_post->type=='A') && ( $user->user_type_id == 2))
                                              <div class="pull-right inline-block">
                                                 <h3 style="color:red ; background-color: #cccccc; padding: 5px; ">Assignment</h3>
                                                 @if($lec_post->uploads->where('user_id',$user->id)->first() )
                                                  <h4 style="color:red ;"><small>Last date was: {{$lec_post->assignment->last_submit_date}}</small></h4>
                                                  <a href="#" type="button" class="btn btn-primary" disabled="disabled" >Submitted</a><i class="fa-x glyphicon glyphicon-ok" ></i>
                                                  @else
                                                  <h4 style="color:red ;">Last date: {{$lec_post->assignment->last_submit_date}}</h4>
                                                  <a href="{{route('submitAssignment',['gid'=>$group->id,'type'=>'D','pid'=>$lec_post->id])}}" type="button" class="btn btn-success">Submit now </a>

                                                  @endif

                                              </div>   
                                  @endif
                                        <a href="#"><h2>{!! nl2br($lec_post->title) !!}</h2></a>
                                        <span>
                                            <small>date:{{ $lec_post->created_at->diffForHumans() }}
                                            </small>
                                        </span>
                            </div>
                            <div>
                                   <p>{!! nl2br($lec_post->body) !!}</p>
                                   @if($contents=$lec_post->contents->where('post_id',$lec_post->id))
                                                @foreach($contents as $content)
                                                    <a class="" href="{{url('download')}}/{{$content->id}}">{{$content->content}} </a>
                                                    <br>
                                                @endforeach
                                          @endif
                            </div>
                            <br>
                          <!--showing all comments in a single post/lecture started  from here -->
                           @if($lec_post->type !='A')
                            @foreach($lec_post->comments as $comment)
                                  <div class="row">    
                                          <div class="col-sm-1">
                                             @if(!empty($comment->user->photo))
                                                     <img class="img-responsive" src="{{asset('img/'.$comment->user->id)}}">
                                              @else
                                                    <img class="img-responsive" src="{{asset('img/backgrounds/default.png')}}">
                                              @endif
                                                   <label>{{ $comment->user->name }}</label>
                                          </div>





                           <div class="col-sm-11">
                              @if( $user->id == $comment->user_id)
                                <div class="pull-right">
                                    <ul class="nav navbar-nav navbar-right">
                                         <li class="dropdown">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <span class=""><i class="fa fa-cog"></i></span>
                                          </a>
                                          <ul class="dropdown-menu" role="menu">
                                          <li><a href="{{route('post_comment_edit',['gid'=>$group->id,'pid'=>$lec_post->id,'cid'=>$comment->id, 'type'=>'C'])}}"><i class="fa fa-pencil fa-fw"></i>Edit</a></li>
                                                      
                                          <li><a onclick="return confirm('are you sure?')" href="{{ route('comment_delete',['gid' => $group->id,'cid'=>$comment->id ]) }}"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>     
                                          </ul>
                                          </li>
                                        </ul>
                                    </div>





                                    @endif
                                      <p>{!!nl2br($comment->comment)!!}</p>
                            </div>         
                        </div>  
                        <hr>
                            @endforeach  
                                         
                          <!--for comment submission form, started-->
                                 <div class="row">
                                        <div class="col-sm-1">
                                               @if(!empty($comment->user->photo))
                                                     <img class="img-responsive" src="{{asset('img/'.$comment->user->id)}}">
                                              @else
                                                    <img class="img-responsive" src="{{asset('img/backgrounds/default.png')}}">
                                              @endif
                                                 <label>{{ $user->name }}</label>
                                        </div>
                                        <div class="col-sm-11">
                                            <form action="{{route('post_comment',['gid' =>$group->id ,'pid' =>$lec_post->id,'type' =>'C'])}}" method="POST" role="form">
                                               {{csrf_field()}}

                                                <div class="form-group">

                                                   <textarea type="text" class="form-control"  name="body" id="" rows="3" placeholder="Write a comment" required></textarea>
                                                  
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-sm btn-primary">Comment</button>
                                                </div>
                                              </form>
                                              @if(count($errors))

                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                              @endif
                                        </div>
                                  </div>
                                 @endif
                            <!--comment submission form ended-->
                        
                       </div>
                      
                </div>
                <hr>
          @endforeach <!--all posts/lectures printing foreach loop ended -->
        </div>
        <div class="col-sm-3">
                 @include('layouts.rightsidebar') <!--this page is extended from layouts -->   
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


