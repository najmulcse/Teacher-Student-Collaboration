@extends('layouts.app')
@section('title')

    <title> TS | Group</title>
@endsection
@section('content')
    <!--sidebar of admin panel -->
    @include('layouts.adminsidebar');
    {{--<div class="container-fluid">--}}

        {{--<div id="mySidenav" class="sidenav">--}}
            {{--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>--}}

            {{--<li class="active treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu ">--}}
                    {{--<li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard </a></li>--}}
                    {{--<li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard </a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<a href="#">Upload files</a>--}}
            {{--<a href="#">Assignment</a>--}}
            {{--<a href="#">Presentation</a>--}}
        {{--</div>--}}

        {{--<!-- Use any element to open the sidenav -->--}}

        {{--<span class="pull-left" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open tasks</span>--}}

        {{--<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->--}}
        {{--<div id="main">--}}

        {{--</div>--}}

    {{--</div>--}}




    {{--<script>--}}
        {{--function openNav() {--}}
            {{--document.getElementById("mySidenav").style.width = "250px";--}}
        {{--}--}}

        {{--function closeNav() {--}}
            {{--document.getElementById("mySidenav").style.width = "0";--}}
        {{--}--}}
    {{--</script>--}}

    <div class="row">
        <div class="col-sm-12">
            <h1>Hello user Group</h1>
        </div>
    </div>

@endsection