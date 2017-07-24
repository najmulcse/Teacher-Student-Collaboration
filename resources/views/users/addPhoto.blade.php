@extends('layouts.homeLayout')



@section('group_body')

<div class="row">
	<div class="col-sm-8">
		<form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
		{{csrf_field()}}
						@if (session('msg'))
							@if(session('status') == 1)
                              <div class="alert alert-success text-center">
                                  {{ session('msg') }}
                              </div>
                            @else
                            <div class="alert alert-danger text-center">
                                  {{ session('msg') }}
                              </div> 
                             @endif 
                        @endif
				<div class="form-group">
					<legend style="padding-left: 10%;">Profile Image</legend>
				</div>
		
				<div class="form-group @if ($errors->has('photo')) has-error @endif">
					<label class="control-label col-sm-4">Choose a image:</label>
					<div class="col-sm-8 ">
						<input type="file" name="photo" id="photo" class="form-control" value="" >
						{!!$errors->first('photo','<span class="help-block">:message</span>')!!}
					</div>
				</div>
				
				<div class="form-group">
				<label class="control-label col-sm-4"></label>
					<div class="col-sm-8 ">
						<button type="submit" class="btn btn-success col-sm-6 col-sm-offset-3">Save </button>
					</div>
				</div>
		</form>
	</div>
	 <div class="col-sm-4">
           {{-- @include('layouts.rightsidebar') --}} <!--this page is extended from layouts -->   
     </div>
</div>

@endsection