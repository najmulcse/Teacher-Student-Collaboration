@extends('layouts.teacherHomeLayout')


@section('group_body_content')



<div class="container-fluid">

<section>
    
    <div class="row">
       <div class="col-sm-8">
       		<h1 class="page-header"> <ol class="breadcrumb">  All Groups  </ol>  </h1>
       </div>
      <div class="col-sm-4">
         <form action="" method="">
              <div class="input-group col-md-12">
                  <input type="text" class="  search-query form-control" placeholder="Search" />
                  <span class="input-group-btn">
                  <button class="btn btn-danger" type="button">
                 <span class=" glyphicon glyphicon-search"></span>
                 </button>
                </span>
            </div>
        </form>
      </div>
    </div>
</section>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-sm-12">
                         
                      
                       <div >
                            <table class="table table-border table-hover">
                                <thead>
                                    <tr>
                                        <th class="">Group Name</th> 
                                        <th class="">Details</th>
                                        <th class="">Edit</th>
                                        <th class="">Delete</th> 
                                    </tr>
                                </thead>

                                    <tbody>
                                        <tr>
                                        <td> <a href="{{ url('/groups/index') }}">Software Engineering</a></td>
                                       <td><a  class="btn btn-primary" data-toggle='modal' data-target="#exampleModalLong" href="#">Details</a></td>
                                       <td><a   class="btn btn-success" data-toggle='modal' data-target="#exampleModalLong" href="#">Edit</a></td>
                                      <td><a   class="btn btn-danger" data-toggle='modal' data-target="#exampleModalLong" href="#">delete</a></td>   
                                        </tr>
                                         <tr>
                                        <td> <a href="#">Web Engineering</a></td>
                                       <td><a  class="btn btn-primary" data-toggle='modal' data-target="#exampleModalLong" href="#">Details</a></td>
                                       <td><a   class="btn btn-success" data-toggle='modal' data-target="#exampleModalLong" href="#">Edit</a></td>
                                      <td><a   class="btn btn-danger" data-toggle='modal' data-target="#exampleModalLong" href="#">delete</a></td>   
                                        </tr>


                                        <tr>
                                        <td> <a href="{{ url('/groups/index') }}">Operating System</a></td>
                                       <td><a  class="btn btn-primary" data-toggle='modal' data-target="#exampleModalLong" href="#">Details</a></td>
                                       <td><a   class="btn btn-success" data-toggle='modal' data-target="#exampleModalLong" href="#">Edit</a></td>
                                      <td><a   class="btn btn-danger" data-toggle='modal' data-target="#exampleModalLong" href="#">delete</a></td>   
                                        </tr>
                                         <tr>
                                        <td> <a href="#">Java SE and PHP </a></td>
                                       <td><a  class="btn btn-primary" data-toggle='modal' data-target="#exampleModalLong" href="#">Details</a></td>
                                       <td><a   class="btn btn-success" data-toggle='modal' data-target="#exampleModalLong" href="#">Edit</a></td>
                                      <td><a   class="btn btn-danger" data-toggle='modal' data-target="#exampleModalLong" href="#">delete</a></td>   
                                        </tr>
                                    
                                    </tbody>
                           </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

@endsection

