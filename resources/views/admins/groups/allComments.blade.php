@extends('layouts.adminLayout')


 @section('admin_content')

<div class="row">
	<div class="col-sm-4 col-sm-offset-4">
		<form>
  			<input type="text" name="search" placeholder="Search.." autocomplete="off" id="search">
		</form>
	</div>
</div>
<br>
<div class="table-responsive" id="txtHint">
<h3>All comments</h3>
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Group ID</th>
				<th>Post ID</th>
				<th>User ID</th>
				<th>Body</th>
				<th>Edit</th>
				<th>Delete</th>
				
			</tr>
		</thead>
		<tbody >
			@foreach($comments as $comment)
			<tr id="g{{$comment->id}}">

			    <td>{{$comment->id}}</td>
				<td>{{$comment->group_id}}</td>
				<td>{{$comment->post_id}}</td>
				<td>{{$comment->user_id}}</td>
				<td>{{$comment->comment}}</td>

				<td >
					<a href="#" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
				</td>
				<td >	
					<button class="btn btn-danger delete-task delete-modal" value="{{$comment->id}}"><i class="fa fa-trash" aria-hidden="true"></i>
						</button>
				</td>
			</tr>



			@endforeach	
		</tbody>
	</table>
</div>


<!--modal,For deleting groups -->

<div class="modal fade" id="modal-id-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete Comment</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure to delete this Comment?</p>
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
   		$("#search").keyup(function(){
       		var str =  $("#search").val();
     		  if(str == "") {
            		   $( "#txtHint" ).html("<b>Please type something to search...</b>"); 
     		  }else {
              		 $.get( "{{ url('admin/searchComment?id=') }}"+str, function( data ) {   
                  	 $( "#txtHint" ).html( data ); 
            			});
       				}		
  	 	});  


   // Delete group
         $('.delete-modal').click(function(){
                  var gid = $(this).val();
                  $('#modal-id-delete').modal('show');

                  $('#delete-confirm').click(function(){

                 $.get( "{{ url('admin/deleteComment?id=') }}"+gid, function( data ) {
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


<style> 
input[type=text] {
    width: 200px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    /*background-image: url('searchicon.png');*/
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
</style>


 @endsection 