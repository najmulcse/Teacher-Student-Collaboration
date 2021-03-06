@extends('layouts.homeLayout')
@section('title')

    <title> TS | Home</title>

@endsection
@section('group_heading')
              <h2 class="page-header">
                    Create Group
                    <small></small>
             </h2>
@endsection
@section('group_body')
   
       <div class="row">                                    
                 <div class="col-sm-9">
                      <div class="panel panel-primary">
                           <div class="panel-heading">
                                <h3 class="panel-title">Create a Group</h3>
                          </div>
                          <div class="panel-body">
                          @if (session('status'))
                              <div class="alert alert-danger text-center">
                                  {{ session('status') }}
                              </div>
                          @endif</small>
                                 <form action="{{url('/store')}}" method="post" class="form-horizontal" >
                                      {{ csrf_field() }}
                                     <div class="form-group @if($errors->has('group_name')) has-error @endif">
                                         <label for="exampleInputEmail1" class="col-sm-3 control-label">Group Name</label>
                                         <div class="col-sm-9">
                                         <input type="text" name="group_name" class="form-control" placeholder="Group Name" value="{{ old('group_name')}}">
                                         {!!$errors->first('group_name','<span class="help-block">:message</span>')!!}
                                         </div>
                                     </div> 
                                <div class="form-group  @if($errors->has('group_code')) has-error @endif">
                                     <label for="title" class="col-sm-3 control-label">Group code</label>
                                     <div class="col-sm-9">
                                       <input type="text" name="group_code" placeholder="Choice a unique Code(Example:group123)" class="form-control" value="{{ old('group_code')}}">

                                       {!! $errors->first( 'group_code','<span class="help-block" >:message </span>')!!}
                                     </div>
                               </div>
                               <div class="form-group">
                                     <label for="title" class="col-sm-3 control-label">Course code</label>
                                     <div class="col-sm-9">
                                       <input type="text" name="course_code" placeholder="Course Code(Example: CSE-1111)" class="form-control">
                                     </div>
                               </div>
                               <div class="form-group">
                                     <label for="title" class="col-sm-3 control-label">Session</label>
                                     <div class="col-sm-9">
                                       <input type="text" name="session" class="form-control" placeholder="Session (Example: 2012-13)" >
                                     </div>
                               </div>
                               <div class="form-group">
                                     <label for="inputEmail3" class="col-sm-3 control-label">Short Description</label>
                                     <div class="col-sm-9">
                                       <textarea  name="short_description" type="text" class="form-control" id="inputtext" placeholder="Short Description about group" rows="5"></textarea>
                                     </div>
                               </div>
                                <div class="form-group">
                                     <div class="col-sm-8"></div>
                                     <div class="col-sm-4">
                                         <button  type="submit" class="btn btn-success form-control" name="add_content">Create group</button>
                                     </div>
                               </div>

                              </form>
                          </div>
                      </div>                                           
                </div>
                <div class="col-sm-3"></div>
       </div> 


@endsection