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
   
<section>
   <div class="panel panel-primary">
            <div class="panel-heading">
                <span> <h2></h2></span>
            </div>

            <div class="panel-body" id="pBody">
                
                <div class="row">                                    
                 <div class="col-md-9">
                    <div class="panel panel-info">
                      
                        <div class="panel-body">
                            <form action="addsubc.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                                 
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="col-sm-3 control-label">Group Name</label>
                                    <div class="col-sm-9">
                                    <input type="text" name="group_name" class="form-control" placeholder="Group Name">
                                    </div>
                                </div> 
                           
                          <div class="form-group">
                                <label for="title" class="col-sm-3 control-label">Course name</label>
                                <div class="col-sm-9">
                                  <input type="text" name="title" placeholder="Course name" class="form-control" required>
                                </div>
                          </div>
                          <div class="form-group">
                                <label for="title" class="col-sm-3 control-label">Year</label>
                                <div class="col-sm-9">
                                  <input type="text" name="title" class="form-control" placeholder="Year" required>
                                </div>
                          </div>
                          <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Short Description</label>
                                <div class="col-sm-9">
                                  <textarea  name="article" type="text" class="form-control" id="inputtext" placeholder="Short Description about group" rows="5" required> </textarea>
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

                
             </div> 

        </div>
                                     
                                      
  

    </div>
        

</section>


@endsection