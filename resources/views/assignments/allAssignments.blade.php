@extends('layouts.homeLayout')

@section('group_heading')
              <h2 class="page-header">
                   <a href="{{ route('id',['id' => $group->id]) }}">{{ $group->group_name }}</a> 
                   <small> >>All Assignments </small>
             </h2>
@endsection
@section('group_body')


<section>
    <div class="row">
        <div class="col-sm-9">
       @if(count($assignments)>0)
          @foreach ($assignments as $assignment) <!-- all lectures foreach started -->
              <div class="row">
                
                       <div class="col-sm-1">
                          <figure>
                            <img class="img-responsive" src="{{asset('img/author.jpg')}}">
                          </figure>
                         <label>{{ $assignment->user->where('id',$assignment->user_id)->first()->name }}</label>
                       </div>
                       <div class="col-sm-11">
                              <div>
                                  @if( ( ($assignment->type)=='A') && ($user->id == $assignment->user_id))
                                      <div class="pull-right">
                                      <h4 style="color:red ;"><small>Last date : {{$assignment->assignment->last_submit_date}}</small></h4>
                                          <ul class="nav navbar-nav navbar-right">
                                                <li class="dropdown">
                                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                           <span class=""><i class="fa fa-cog"></i></span>
                                                      </a>
                                                      <ul class="dropdown-menu" role="menu">
                                                          <li><a href="{{ route('edit_post',['gid'=>$group->id,'pid' =>$assignment->id, 'type'=>'A']) }}"><i class="fa fa-pencil fa-fw"></i>Edit</a></li>

                                                         <li><a onclick="return confirm('are you sure?')" href="{{ route('post_deleted',['gid' => $group->id,'pid'=>$assignment->id ]) }}"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>  
                                                     </ul>
                                                </li>
                                          </ul>
                                      </div>
                                   @elseif( ( $assignment->type=='A') && ($user->user_type_id == 2))
                                              <div class="pull-right inline-block">
                                                  
                                                  @if($assignment->upload)
                                                  <h4 style="color:red ;"><small>Last date was: {{$assignment->assignment->last_submit_date}}</small></h4>
                                                  <a href="#" type="button" class="btn btn-primary" disabled="disabled" >Submitted</a><i class="fa-x glyphicon glyphicon-ok" ></i>
                                                  @else
                                                  <h4 style="color:red ;">Last date: {{$assignment->assignment->last_submit_date}}</h4>
                                                  <a href="{{route('submitAssignment',['gid'=>$group->id,'type'=>'D','pid'=>$assignment->id])}}" type="button" class="btn btn-success">Submit now </a>
                                                  @endif
                                              </div>    
                                  @endif
                                  <h2>{{ $assignment->title }}</h2>
                                  <span>
                                     <small>
                                          date:{{ $assignment->created_at->diffForHumans() }}
                                      </small>
                                  </span>
                               </div>
                                    <div>
                                         <p>{{ $assignment->body }}</p>
                                          <div>
                                          @if($contents=$assignment->contents->where('post_id',$assignment->id))
                                                @foreach($contents as $content)
                                                    <a class="" href="{{url('download')}}/{{$content->id}}">{{$content->content}} </a>
                                                @endforeach
                                          @endif
                                          </div>
                                    </div>
                                    <br>
                                             
                       </div>                      
                
                </div>
                <hr>
                   @endforeach  <!-- all lectures foreach ended -->

           @else
           <h2>Currently empty!!!</h2>
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


