@extends('layouts.homeLayout')

@section('group_heading')
           
@endsection
@section('group_body')


<section>

	@if(count($groups)>0 || count($posts)>0)
	<div class="row">
		<div class="col-sm-8">
		    <div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr >
						<th>Search Result</th>
					</tr>
				</thead>
				<tbody id="s_result">
					@foreach($groups as $group)
					<tr>
						<td> <a href="{{route('id',['id'=>$group->id])}}">{{$group->group_name}}</a></td>
					</tr>
					@endforeach	

					@foreach($posts as $post)
					<tr>
					@if($post->type == 'P')
						@if(!empty($post->title))
						<td> <a href="{{route('allPosts',['gid'=>$post->group_id])}}">{{$post->title}}</a></td>
						@else
						<td> <a href="{{route('allPosts',['gid'=>$post->group_id])}}">{{$post->body}}</a></td>
						@endif
					@elseif($post->type == 'A')
						
						<td> <a href="{{route('allAssignments',['gid'=>$post->group_id])}}">{{$post->title}}</a></td>
					@else
						<td> <a href="{{route('allLectures',['gid'=>$post->group_id])}}">{{$post->title}}</a></td>
					@endif
					</tr>
					@endforeach	
				</tbody>
			</table>
		</div> 
		</div> 
		<div class="col-sm-4"></div>
		@else
		<h3>No result found</h3>
		@endif

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






