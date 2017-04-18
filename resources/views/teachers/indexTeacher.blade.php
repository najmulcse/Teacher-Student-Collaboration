<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teacher | TS-GROUP</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/libs.css')}}">
    <link rel="stylesheet" href="{{asset('css/sbadmin.css')}}">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if (Auth::guest())
                    <a class="navbar-brand" href="{{ url('/') }}">
                        TS-Group
                    </a>
                @else
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        TS-Group
                    </a>
                @endif
            </div>

            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else

                    <li><a href="{{ url('/home') }}">Home</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-dashboard"></i>Changed Password </a>
                            </li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <!-- side bar -->



            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">

                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">New Group</button>

                        <!-- Modal -->
                        <div class="modal" id="myModal" role="dialog">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Create New Group</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('')}}" method="post">
                                            <div class="form-group">
                                                <label >Group Name *</label>
                                                <input class="form-control" name="groupname" placeholder="Enter group name">
                                            </div>
                                            <div class="form-group">
                                                <label >Course name *</label>
                                                <input class="form-control" name="coursename" placeholder="Enter course name" >
                                            </div>
                                            <div class="form-group">
                                                <label >Year *</label>

                                                <select class="form-control">
                                                    <option>Select year</option>
                                                    <option>1st</option>
                                                    <option>2nd</option>
                                                    <option>3rd</option>
                                                    <option>4th</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label >Short description about group</label>
                                                <textarea class="form-control" name="short_description" rows="3" placeholder="Description"></textarea>
                                            </div>


                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" >Create group</button>
                                    </div>
                                </div>
                            </div>
                        </div>  <!-- Modal end-->

                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v "></i> Groups <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                            <ul id="demo" class="collapse">
                                <li>
                                    <a href="#">Group 1</a>
                                </li>
                                <li>
                                    <a href="#">Group 2</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i>Profile</a>
                        </li>

                    </ul>
                </div>

                <!-- /.navbar-collapse -->

            </div>
           </div>

        </nav>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-sm-12">
                         <h1 class="page-header"> <ol class="breadcrumb">  All Groups  </ol>  </h1>
                      
                       <div >
                            <table class="table table-border table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Group Name</th> 
                                        <th class="text-center">Details</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th> 
                                    </tr>
                                </thead>

                                    <tbody>
                                        <tr>
                                        <td> <a href="#">Software Engineering</a></td>
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

        </div>
        <!-- /#page-wrapper -->

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{asset('js/libs.js')}}"></script>

</body>

</html>
