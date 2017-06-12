@extends('layouts.homeLayout')

@section('group_heading')
              <h2 class="page-header">
                   <a href="{{ route('id',['id' => $group->id]) }}">{{ $group->group_name }}</a> 
                   <small> >>Submitted Assignments </small>
             </h2>
@endsection
@section('group_body')


<section>
    <div class="row">
        <div class="col-sm-9">
           <select class="form-control" id="catId" name="assign" onchange="selectAssignment(this.value)">    
               <option value="">Select Assignment</option>
                  @foreach( $assignments as $assignment)
                  <option value="{{$assignment->id}}" class="form-control">{{$assignment->title}}
                  </option>    
                  @endforeach
           </select>
        {!!$errors->first('assignment_title','<span class="help-block">:message</span>')!!}
        <div id="pid">
       @if(count($assignments)>0)
         <div class="table-responsive">
           <table class="table ">
             <thead>
               <tr>
                 <th>Roll</th>
                 <th>Name</th>
                 <th>File</th>
                 <th>Status</th>
               </tr>
             </thead>
             <tbody>
              @foreach ( $group->members as $member)
                  <tr>
                       <td>{{$member->student->roll}}</td>
                       <td>{{$member->user->name}}</td>
                    @if($m=$member->upload()->where('post_id',13)->first())
                       <td><a href="{{url('downloadA')}}/{{$m->id}}">{{$m->link}}</a></td>
                       <td><a type="button" class="btn btn-sm btn-success">Submitted</a></td>
                    @else
                       <td></td>
                       <td></td>
                    @endif
                  </tr>
              @endforeach
             </tbody>
           </table>
         </div>
       @else
           <h2>Currently empty!!!</h2>
       @endif 
       </div>       
        </div>

        <div class="col-sm-3">

                 @include('layouts.rightsidebar') <!--this page is extended from layouts -->
       </div>
   </div>

</section>

</div>

<script>


function selectAssignment(id){

    // var a=document.getElementById("catId").value ;// = document.getElementById("catId").value ;
    // document.getElementById("pid").value=a;
   // document.write(id);

    $.ajax({

      method :'POST',
      url    : '/ajaxReq',
      data   :{'id' :id},
      success:function(data){
                  $("#pid").html(data);
               }

    });

// return;
}



function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
@endsection


