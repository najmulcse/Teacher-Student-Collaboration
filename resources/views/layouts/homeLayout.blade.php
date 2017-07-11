<script>
window.Laravel = <?php echo json_encode([
'csrfToken' => csrf_token(),
]); ?>
</script>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="intercoolerjs:use-data-prefix" content="true"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home | TS-Group</title>

    <!-- Bootstrap Core CSS -->
   <script type="text/javascript" src="{{asset('js/jqueryn.js')}}"></script>
  {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
    <script src="{{asset('js/intercooler.min.js')}}"></script>
    <link href="{{asset('css/mystyle.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
   <!--  <link href="css/style.css" rel="stylesheet" type="text/css" > -->
    <link href="{{ asset('css/sbadmin.css')}}" rel="stylesheet">
    <!-- Custom Fonts -->
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

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


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell">4</i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ url('/home') }}">Home</a></li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                       <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/registerTeacher') }}">Sign up as Teacher</a></li>
                        <li><a href="{{ url('/registerStudent') }}">Sign up as Student</a></li>
                    @else
                        @if(Auth::user()->isAdmin())
                        <li><a href="{{ url('/admin')}}">Admin</a></li>
                        @endif

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
                        <a href="{{url('/home')}}"><i class="fa fa-fw fa-group"></i>    Groups</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-user fa-fw""></i> Profile <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#"> <i class="fa fa-unlock""></i> Changed Password</a>
                            </li>
                            <li>
                                <a href="#"> <i class="fa fa-user""></i> Edit Profile</a>
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
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">  <!-- searching started -->
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
                    </div>  <!-- searching ended -->
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">  <!-- group creating button started -->
                        <ul class="list-inline">
                           <li class="list-inline-item"> <a class="btn btn-success btn-lg" href="{{url('/joinGroup')}}" role="button">Join Group</a> </li>
                            <li class="list-inline-item"><a class="btn btn-success btn-lg" href="{{url('/create')}}" role="button">Create Group</a></li>
                        </ul>
                    </div>   <!-- group creating button ended -->
                </div> 
                <!-- Page header and search ended -->

                <div class="row">  
                        <div class="col-lg-12">  <!--Group heading started -->
                           @yield('group_heading')
                        </div><!--Group heading ended -->
                </div>

                <div class="row"> <!--Group body started -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        @yield('group_body')
                    </div> <!--Group body ended -->

                </div>
                </div> 
                    </div>
               
               
                <!-- group body contents started -->

            <!-- /.container-fluid -->
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    

    <!-- Bootstrap Core JavaScript -->
    <meta name="_token" content="{!! csrf_token() !!}" />
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
