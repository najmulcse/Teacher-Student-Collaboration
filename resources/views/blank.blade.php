
{{-- @extends('layouts.homeLayout')

@section('group_heading')
              <h2 class="page-header">
                   
                   <small></small>
             </h2>
                                
@endsection
@section('group_body')
    <div class="row">
        <div class="col-sm-9">
              <div class="row">
                     <div class="col-sm-1">
                       
                     </div>
                     <div class="col-sm-10">
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Panel title</h3>
	</div>
	<div class="panel-body">
	
<form action="{{route('test2')}}" method="POST" role="form">
  {{csrf_field()}}
	<legend>Form title</legend>
                       @if(count($errors))

                         @foreach($errors->all() as $error)
                             <li>{{$error}}</li>
                         @endforeach
                       @endif
	<div class="form-group">
		<label for="">label</label>
		<input type="text" class="form-control" id="" name="name" placeholder="Input field">
	</div>
   

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
  
	</div>
</div>
</div>
                   <div class="col-sm-1">
                     
                   </div>
                
                  
                 </div>
       

        </div>
        <div class="col-sm-3">
        </div>
        </div>
       @endsection --}}
       

       {{phpinfo()}}