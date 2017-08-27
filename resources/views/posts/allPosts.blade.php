@extends('layouts.homeLayout')

@section('group_heading')
              <h2 class="page-header">
                   <a href="{{ route('id',['id' => $group->id]) }}">{{ $group->group_name }}</a> 
                    <small> >>All posts </small>
             </h2>
@endsection
@section('group_body')

    <div class="row">
        <div class="col-sm-9">
        @if(count($posts)>0)
          @foreach ($posts as $post) <!--For Printing all post foreach loop started hro here  -->
              <div class="row">
                  
                       <div class="col-sm-1">
                          <figure>
                          @if(!empty($post->user->photo))
                            <img class="img-responsive" src="{{asset('img/'.$post->user->id)}}">
                            @else
                            <img class="img-responsive" src="{{asset('img/backgrounds/default.png')}}">
                            @endif
                          
                          <label>{{ $post->user->name }}</label>
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
                                                       <!--  <a class="btn btn-info" data-toggle="modal" href='#{{$post->id}}'> <i class="fa fa-trash-o fa-fw"></i>Delete</a>
 -->
                                                        <li><a onclick="return confirm('are you sure?')" href="{{ route('post_deleted',['gid' => $group->id,'pid'=>$post->id , 'type'=>'P']) }}"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>     
                                                </ul>
                                          </li>
                                    </ul>
                              </div>
                          @endif
                          <!-- For showing single post started here-->
                              <small>  
                                  date:{{ $post->created_at->diffForHumans() }}
                              </small>
                              <div>                                   
                                      <p>{!!  nl2br($post->body) !!}</p>
                                      <div>
                                          @if($contents=$post->contents->where('post_id',$post->id))
                                                @foreach($contents as $content)
                                                
                                                   <a  href="{{url('download')}}/{{$content->id}}">{{$content->content}} </a>
                                                @endforeach
                                          @endif
                                      </div>
                              </div>
                               <!-- For showing single post ended here-->
                              <br>
                              <!-- For showing comments-->
                            @foreach($post->comments as $comment)
                              <div class="row">    
                                          <div class="col-sm-1">
                                                 <img class="img-responsive" src="{{asset('img/'.$comment->user->id)}}">
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
                                                                         <li><a href="#"><i class="fa fa-pencil fa-fw"></i>Edit</a></li>
                                                       <!--  <a class="btn btn-info" data-toggle="modal" href='#{{$post->id}}'> <i class="fa fa-trash-o fa-fw"></i>Delete</a>
 -->
                                                                         <li><a onclick="return confirm('are you sure?')" href="#"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>     
                                                                </ul>
                                                           </li>
                                                    </ul>
                                              </div>
                                              @endif
                                              
                                              <p>{!! nl2br($comment->comment) !!}</p>
                                          </div>
                                                
                                  </div>  
                               @endforeach  
                                        
                                        <!--for comment submission form-->
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
                                         
                                              <form action="{{route('post_comment',['gid' =>$group->id ,'pid' =>$post->id,'type' =>'P'])}}" method="POST" role="form">
                                               {{csrf_field()}}

                                                <input type="hidden" name="p_comment_id" value="{{$post->id}}">

                                                <div class="form-group @if($errors->has('body') && ($post->id == 41 )) has-error @endif" >
                                                 
                                                        <textarea type="text" class="form-control" name="body" id="" rows="3" placeholder="Write a comment" required>{{old('body')}}</textarea>
                                                      {!!$errors->first('body','<span class="help-block">:message </span>')!!}
                                                  </div>
                                                <div class="form-group">
                                                  
                                                        <button type="submit" class="btn btn-sm btn-primary">Comment</button>
                                                </div>
                                              </form>
                                        </div>
                                  </div>   <!-- comment submission form ended-->
                                 
                  </div>
                      
            </div>
                      
               <hr>
{{-- 
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

 --}}
          @endforeach
        @else
        <h2>Empty !!!</h2>
        @endif  

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

// function deletePost($pid,$gid) {

 
//   var xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//      document.getElementById("demo").innerHTML = this.responseText;
//     }
//   };  
//       xmlhttp.open("GET", 'group/{$gid}/post/{$pid}/delete', true);
//       xmlhttp.send();

//   // $.ajax({
//   //       type: "POST",
//   //       url: '.post_deleted',
//   //       data:'post_deleted'+$gid,
//   //        success: function(response){ // What to do if we succeed
//   //             if(data == "success")
//   //              alert(response); 
//   //              }
//   //   })
// }



</script>

@endsection


