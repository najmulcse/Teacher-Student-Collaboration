@extends('layouts.homeLayout')

@section('group_heading')
              <h2 class="page-header">
                   <a href="{{ route('id',['id' => $group->id]) }}">{{ $group->group_name }}</a> 
                   <small> >>All lectures </small>
             </h2>
@endsection
@section('group_body')


<section>
    <div class="row">
        <div class="col-sm-9">
        @if(count($lectures)>0)
          @foreach ($lectures as $lecture) <!-- all lectures foreach started -->
              <div class="row">
                
                       <div class="col-sm-1">
                          <figure>
                            @if(!empty($lecture->user->photo))
                            <img class="img-responsive" src="{{asset('img/'.$lecture->user->id)}}">
                            @else
                            <img class="img-responsive" src="{{asset('img/backgrounds/default.png')}}">
                            @endif
                          </figure>
                         <label>{{ $lecture->user->where('id',$lecture->user_id)->first()->name }}</label>
                       </div>
                       <div class="col-sm-11">
                              <div>
                                        
                                  <h2>{!! nl2br($lecture->title) !!}</h2>
                                  @if( ( ($lecture->type)=='L') && ($user->id == $lecture->user_id))
                                      <div class="pull-right">
                                          <ul class="nav navbar-nav navbar-right">
                                                <li class="dropdown">
                                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                           <span class=""><i class="fa fa-cog"></i></span>
                                                      </a>
                                                      <ul class="dropdown-menu" role="menu">
                                                          <li><a href="{{ route('edit_post',['gid'=>$group->id,'pid' =>$lecture->id, 'type'=>'L']) }}"><i class="fa fa-pencil fa-fw"></i>Edit</a></li>

                                                         <li><a onclick="return confirm('are you sure?')" href="{{ route('post_deleted',['gid' => $group->id,'pid'=>$lecture->id , 'type'=>'L']) }}"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>  
                                                     </ul>
                                                </li>
                                          </ul>
                                      </div>
                                  @endif
                                  <span>
                                     <small>
                                          date:{{ $lecture->created_at->diffForHumans() }}
                                      </small>
                                  </span>
                               </div>
                                    <div>
                                         <p>{!! nl2br($lecture->body) !!}</p>
                                          <div>
                                          @if($contents=$lecture->contents->where('post_id',$lecture->id))
                                                @foreach($contents as $content)
                                                    <a class="" href="{{url('download')}}/{{$content->id}}">{{$content->content}} </a>
                                                    <br>
                                                @endforeach
                                          @endif
                                          </div>
                                    </div>
                                    <br>
                       <!--for showing comments -->
                               @foreach($lecture->comments as $comment)
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
                                                                         <li><a href="{{route('post_comment_edit',['gid'=>$group->id,'pid'=>$lecture->id,'cid'=>$comment->id, 'type'=>'L'])}}"><i class="fa fa-pencil fa-fw"></i>Edit</a><!--  -->

                                                                         <li><a onclick="return confirm('are you sure?')" href="{{ route('comment_delete',['gid' => $group->id,'cid'=>$comment->id ]) }}"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>     
                                                                 </ul>
                                                             </li>
                                                          </ul>
                                                        </div>
                                                  @endif
                                                       <p>{!! nl2br($comment->comment) !!}</p>
                                                  </div>          
                                         </div>  
                               @endforeach  
                       <!-- ended showing comments --> 

                       <!--for comment submission started from here -->
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
                                        
                                              <form action="{{route('post_comment',['gid' =>$group->id ,'pid' =>$lecture->id,'type' =>'L'])}}" method="POST" role="form">
                                               {{csrf_field()}}
                                                <div class="form-group">

                                                  <textarea type="text" class="form-control"  name="body" id="" rows="3" placeholder="Write a comment"></textarea>
                                                </div>
                                              
                                                <button type="submit" class="btn btn-sm btn-primary">Comment</button>
                                              </form>
                                        </div>
                                  </div>
                                 
                       <!--for comment submission ended -->                                             
                       </div>                      
                
                </div>
                <hr>
                   @endforeach  <!-- all lectures foreach ended -->
                @else
                   <h2>Empty !!!</h2>
                @endif  
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


