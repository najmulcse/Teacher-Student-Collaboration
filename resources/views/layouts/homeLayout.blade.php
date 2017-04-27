<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home | TS-Group</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/mystyle.css" rel="stylesheet" type="text/css" >
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
   <!--  <link href="css/style.css" rel="stylesheet" type="text/css" > -->
    <link href="css/sbadmin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body id="app-layout">
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
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

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
               

                <!-- Right Side Of Navbar started-->
                <ul class="nav navbar-nav navbar-right log_nav">
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
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul> <!-- Right Side Of Navbar ended-->
            </div>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="{{url('/home')}}"><i class="fa fa-fw fa-group"></i>Groups</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Profile <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Changed Password</a>
                            </li>
                            <li>
                                <a href="#">Edit Profile</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page header and search -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="row">  <!-- searching started -->
                                <div class="col-sm-4 col-md-4 col-xs-3">
                                    <h1 class="page-header">
                                  All Groups
                                    <small>#20</small>
                                    </h1>
                                </div>
                                <div class="col-sm-4 col-md-4 col-xs-12" >
                                    <form action="searchResult.php" method="POST">
                                       <div class="input-group col-md-12 ">
                                        <input type="text" class="input_search  search-query form-control " name="search_value" placeholder="Search" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger" type="submit" name="search">
                                                <span class=" glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                      </div>                                
                                    </form>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-3 ">
<!--                                   <a href="{{url('/create')}}" class="pull-right create_group_button">Create new group</a> -->
                              </div>
                        </div> <!-- searching ended -->       
                    </div>
                </div>
                <!-- /.row end for page header and search-->

                <!-- group body contents started -->
                @yield('group_body')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
