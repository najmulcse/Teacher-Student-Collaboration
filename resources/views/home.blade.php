@extends('layouts.teacherHomeLayout')


@section('group_body_content')



<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-sm-12">
                         <h1 class="page-header"> <ol class="breadcrumb">  All Groups  </ol>  </h1>
                      
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
                                    
                                    </tbody>
                           </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

@endsection

