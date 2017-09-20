@extends('layouts.homeLayout')

@section('group_heading')
              <h2 class="page-header">
                   <a href="{{ route('id',['id' => $group->id]) }}">{{ $group->group_name }}</a> 
                   <small>All members</small>
             </h2>
@endsection
@section('group_body')


<section>


    <div class="row">
        <div class="col-sm-9">
          @if(count($members)>0)
            
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                  
                    <th>Name</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($members as $member)
                  <tr>
                    {{-- <td> 
                          @if(!empty($member->user->photo))
                              <img class="img-responsive" style="height: 20px; width: 20px;" src="{{asset('img/'.$member->user->id)}}">
                          @else
                              <img class="img-responsive" src="{{asset('img/backgrounds/default.png')}}">
                          @endif
                          
                    </td> --}}
                    <td>
                      {{$member->user->name}}
                    </td>
                    <td>
                      <a href="{{route('removeMember',['id'=>$member->id])}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                  </tr>
                  @endforeach 
                </tbody>
              </table>
            </div>
          @else
          <h3>No members </h3>
          @endif
        </div>
        <div class="col-sm-3">
                 @include('layouts.rightsidebar') <!--this page is extended from layouts -->   
        </div>
  </div>


</section>

</div>

<!--modal,For deleting groups -->

<div class="modal fade" id="modal-id-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete Member</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure to delete this Member?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="delete-confirm">Delete</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

  $(document).ready(function(){


   // Delete group
         $('.delete-modal').click(function(){
                  var gid = $(this).val();
                  $('#modal-id-delete').modal('show');

                  $('#delete-confirm').click(function(){

                 $.get( "{{ url('group/removeMember?id=') }}"+gid, function( data ) {
                          if(data.status === 'success')
                          {
                              $('#g'+gid).remove();
                              $('#modal-id-delete').modal('hide');
                          }
                 });
              });
      }); 
});

</script>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
@endsection


