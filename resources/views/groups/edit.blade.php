@extends('layouts.homeLayout')
@section('title')

    <title> TS | Home</title>

@endsection
@section('group_heading')
              <h2 class="page-header">
                    Edit Group
                    <small></small>
             </h2>
@endsection
@section('group_body')
   
<section>
   <div class="panel panel-primary">
            <div class="panel-heading">
                <span> <h2></h2></span>
            </div>

            <div class="panel-body" id="pBody">
                
                <div class="row">                                    
                 <div class="col-sm-9">
                    <div class="panel panel-info">
                      
                        <div class="panel-body">
                        @if (session('message'))
                            <div class="alert alert-danger text-center">
                                {{ session('message') }}
                            </div>
                        @endif
                            <form action="{{route('update',['id'=>$group->id])}}" method="post" class="form-horizontal" >
                                 {{ csrf_field() }}
                                 {{method_field('PATCH')}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="col-sm-3 control-label">Group Name</label>
                                    <div class="col-sm-9">
                                    <input type="text" name="group_name" class="form-control" value='{{ $group->group_name}}'>
                                    </div>
                                </div> 
                            <div class="form-group">
                                <label for="title" class="col-sm-3 control-label">Group code</label>
                                <div class="col-sm-9">
                                  <input type="text" name="group_code" class="form-control" value="{{$group->group_code}}">
                                </div>
                          </div>
                          <div class="form-group">
                                <label for="title" class="col-sm-3 control-label">Course code</label>
                                <div class="col-sm-9">
                                  <input type="text" name="course_code" value='{{ $group->course_code}}' class="form-control">
                                </div>
                          </div>
                          <div class="form-group">
                                <label for="title" class="col-sm-3 control-label">Session</label>
                                <div class="col-sm-9">
                                  <input type="text" name="session" class="form-control" value='{{ $group->session }}'>
                                </div>
                          </div>
                          <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Short Description</label>
                                <div class="col-sm-9">
                                  <textarea  name="short_description" type="text" class="form-control" id="inputtext" rows="5">{{ $group->short_description }}</textarea>
                                </div>
                          </div>
                           <div class="form-group">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-4">
                                    <button  type="submit" class="btn btn-success form-control" name="add_content">Update group</button>
                                </div>
                          </div>

                         </form>
                        </div>
                     
                                   

                    </div>
                                                                 
                </div>
                <div class="col-sm-3"></div>

                
             </div> 

        </div>
                                     
                                      
  

    </div>
        

</section>


@endsection