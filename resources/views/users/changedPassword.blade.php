@extends('layouts.homeLayout')



@section('group_body')

<div class="row">
	<div class="col-sm-9">
		<form action="{{route('store.password')}}" method="POST" class="form-horizontal" role="form">
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
					<legend style="padding-left: 10%;">Password Changed</legend>
				</div>
		
				<div class="form-group @if ($errors->has('current_password')) has-error @endif">
					<label class="control-label col-sm-4">Current Password:</label>
					<div class="col-sm-8 ">
						<input type="password" name="current_password" id="input" class="form-control" value=""  placeholder="Current password">
						{!!$errors->first('current_password','<span class="help-block">:message</span>')!!}
					</div>
				</div>
				<div class="form-group @if ($errors->has('password')) has-error @endif">
					<label class="control-label col-sm-4">New Password:</label>
					<div class="col-sm-8">
						<input type="password" name="password" id="input" class="form-control" value="" placeholder="New password">
						{!!$errors->first('password','<span class="help-block">:message</span>')!!}
					</div>
				</div>
				<div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
					<label class="control-label col-sm-4">Confirmed Password:</label>
					<div class="col-sm-8">
						<input type="password" name="password_confirmation" id="input" class="form-control" value="" placeholder="Confirmed password" >
						{!!$errors->first('password_confirmation','<span class="help-block">:message</span>')!!}
					</div>
				</div>
		
				<div class="form-group">
				<label class="control-label col-sm-4"></label>
					<div class="col-sm-8 ">
						<button type="submit" class="btn btn-success">Update Password </button>
					</div>
				</div>
		</form>
	</div>
	 <div class="col-sm-3">
           {{-- @include('layouts.rightsidebar') --}} <!--this page is extended from layouts -->   
     </div>
</div>

@endsection