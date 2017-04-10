@extends('layouts.app')
@section('title')

    <title> TS | Group</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <a href="#">Upload files</a>
            <a href="#">Assignment</a>
            <a href="#">Presentation</a>
        </div>

        <!-- Use any element to open the sidenav -->

        <span class="pull-left" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open tasks</span>

        <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
        <div id="main">

        </div>

    </div>




    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
@endsection