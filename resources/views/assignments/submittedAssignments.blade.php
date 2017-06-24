@extends('layouts.homeLayout')

@section('group_heading')
              <h2 class="page-header">
                   <a href="{{ route('id',['id' => $group->id]) }}">{{ $group->group_name }}</a> 
                   <small> >>Submitted Assignments </small>
             </h2>
             <p id="aa"></p>
@endsection
@section('group_body')


<section>
    <div class="row">
        <div class="col-sm-9">
           <select class="form-control" id="catId" name="assign" >    
               <option value="">Select Assignment</option>
                  @foreach( $assignments as $assignment)
                  <option value="{{$assignment->id}}" class="form-control">{{$assignment->title}}
                  </option>    
                  @endforeach
           </select>
        {!!$errors->first('assignment_title','<span class="help-block">:message</span>')!!}
      <div id="pid" name="pid">
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


       // $.get('/assignmentFilter/'+id, function(data){
            
       // console.log(data); run again
       // });
//Selecting the assignment id by this ajax request 

    // function assignment(id)
    // {
    //   var i = Number(id);

    //   $.ajax({
    //     type :'GET',
    //     url :'/assignmentFilter/'+i,
    //     dataType: 'json',
    //     headers: {
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     },
    //     success : function(data){ 
    //             console.log(data);
    //     },
    //      error: function (err) {
    //              console.log(err); 
    //             }
    //    });

    // }


 $(document).ready(function() {

        $('select[name="assign"]').on('change', function() {
            var assignID = $(this).val();
            if(assignID) {
                $.ajax({
                    url: '/assignmentFilter/'+assignID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                      console.log(data);
                    // $('#pid').children().css('visibility','hidden');
                      $('#pid').text(data);     
                    }
                });
            }
        });
    });


function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
@endsection


