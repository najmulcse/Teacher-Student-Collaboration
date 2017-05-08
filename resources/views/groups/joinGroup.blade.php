@extends('layouts.homeLayout')
@section('title')

    <title> TS | Home</title>

@endsection
@section('group_heading')
              <h2 class="page-header">
                    Join Group
                    <small>
                      @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                      @endif</small>
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

                            <form action="{{ url('/checkGroup')}}" method="post" class="form-horizontal" >
                                 {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="col-sm-3 control-label">Group Code</label>
                                    <div class="col-sm-7">
                                    <input type="text" name="group_code" class="form-control" placeholder="Enter a valid group code" required>
                                    </div>
                                    <div class="col-sm-2">
                                    <button  type="submit" class="btn btn-success form-control" name="add_content">Join group</button>
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