@extends('layouts.app')
@section('title')

    <title> TS | Home</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-6 groupBackground">
                <form role="form" action="index" method="post" class="login-form">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <input type="text" name="name" placeholder="Group name" class="form-username form-control" id="form-username" value="{{old('name')}}">

                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <input type="text" name="name" placeholder="Course name" class="form-username form-control" id="form-username" value="{{old('name')}}">

                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" name="name" placeholder="Year" class="form-username form-control" id="form-username" value="{{old('name')}}">


                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <textarea class="form-control" rows="5" placeholder="Short description about group"></textarea>
                    </div>

                    <button type="submit" class="btn">
                        <i class="fa fa-btn fa-user"> </i> Create group!</button>
                </form>
            </div>
            <div class="col-sm-2"></div>
            <div >

            </div>

        </div>


    </div>


@endsection