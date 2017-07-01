@extends('layouts.adminLayout')


 @section('admin_content')

<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<form action="" method="POST" class="form-inline" role="form">
			<div class="form-group">
				<input type="text" class="form-control" id="" placeholder="Search...">
			<button type="submit" class="btn btn-primary"><i class="search">Search</i></button>
			</div>
		</form>
	</div>
</div>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>S.N</th>
				<th>Group</th>
				<th>Description</th>
				<th>Code</th>
				<th>Course</th>
				<th>Author</th>
				<th>Edit</th>
				<th>Delete</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach($groups as $group)
			<tr>
				<td>{{$group->id}}</td>
				<td>{{$group->group_name}}</td>
				<td>{{$group->short_description}}</td>
				<td>{{$group->group_code}}</td>
				<td>{{$group->course_code}}</td>
				<td>{{$group->user->name}}</td>
				
					<td ><a href="#" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
					<td ><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> </a>
				</td>
			</tr>
			@endforeach	
		</tbody>
	</table>
</div>

 @endsection 