<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr >
				<th>Search Result</th>
			</tr>
		</thead>
		<tbody id="s_result">
			<tr>
			@foreach($results as $result)
				<td>{{$result}}</td>
			@endforeach	
			</tr>
		</tbody>
	</table>
</div>