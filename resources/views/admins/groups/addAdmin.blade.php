@extends('layouts.adminLayout')


 @section('admin_content')

<div class="row">
  <div class="col-sm-9">
    <form action="{{route('store.admin')}}" method="POST" class="form-horizontal" role="form">
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
          <legend style="padding-left: 10%;">Add Admin</legend>
        </div>
        <input type="hidden" name="user_type_id" value="3">
        <div class="form-group @if ($errors->has('name')) has-error @endif">
          <label class="control-label col-sm-4">Name</label>
          <div class="col-sm-8 ">
            <input type="text" name="name" id="input" class="form-control" value=""  placeholder="Name">
            {!!$errors->first('name','<span class="help-block">:message</span>')!!}
          </div>
        </div>
        <div class="form-group @if ($errors->has('email')) has-error @endif">
          <label class="control-label col-sm-4">Email</label>
          <div class="col-sm-8 ">
            <input type="email" name="email" id="input" class="form-control" value=""  placeholder="Email">
            {!!$errors->first('email','<span class="help-block">:message</span>')!!}
          </div>
        </div>
        <div class="form-group @if ($errors->has('password')) has-error @endif">
          <label class="control-label col-sm-4">Password:</label>
          <div class="col-sm-8">
            <input type="password" name="password" id="input" class="form-control" value="" placeholder="password">
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
            <button type="submit" class="btn btn-success">Add  </button>
          </div>
        </div>
    </form>
  </div>
   <div class="col-sm-3">
           {{-- @include('layouts.rightsidebar') --}} <!--this page is extended from layouts -->   
     </div>
</div>


 @endsection 