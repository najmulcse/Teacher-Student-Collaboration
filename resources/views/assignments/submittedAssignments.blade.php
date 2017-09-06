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
        @if(count($assignments)>0)
        <form >
          <div class="form-group">
            <label class="">Assignment Title</label>
            <div class="">
                <select class="form-control" id="catId" name="assign" >    
                   <option value="">Select Assignment</option>
                 
                  @foreach( $assignments as $assignment)
                  <option value="{{$assignment->id}}" class="form-control">{{$assignment->title}}
                  </option>    
                  @endforeach
              
              </select>
              {!!$errors->first('assignment_title','<span class="help-block">:message</span>')!!}
            </div>
          </div>
          <div class="form-group">
            <div class=" ">
            <input type="hidden" name="" id="gid" value="{{$assignment->group_id}}"> 
            </div>
            </div>
        </form>
          @else
          <h2>Currently empty!!!</h2>
          @endif
            <div class="table-responsive" id="pid">
           </div>
        </div>

        <div class="col-sm-3">

                 @include('layouts.rightsidebar') <!--this page is extended from layouts -->
       </div>
   </div>

</section>

</div>

<script>


 

 $(document).ready(function() {

        $('select[name="assign"]').on('change', function() {
            var assignID = $(this).val();
            var gid      = $('#gid').val();
            
            if(assignID) {


               $.get( "{{ url('/assignmentFilter') }}"+'/'+assignID+'/'+gid, function( data ) {   
                     $( "#pid" ).html( data ); 
                  });
                // $.ajax({
                //     url: '/assignmentFilter/'+assignID+'/'+gid,
                //     type: "GET",
                //     dataType: "json",
                //     success:function(data) {
                //       console.log(data);
                //     // $('#pid').children().css('visibility','hidden');
                //       $('#pid').html(data);     
                //     }
                // });
            }else{
              $( "#pid" ).html( '<h2>Please Select Assignment Title</h2>' );
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


