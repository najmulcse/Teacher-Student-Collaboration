@extends('layouts.app')


@section('title')
    <title> TS </title>
@endsection



@section('content')
<div class="">
    <section class="landingPageCover">
    <div class="row">
        <div class="col-sm-12 ">

            <div class="col-sm-4">
                <h3 class="pullme"> Welcome to Collaborate Group</h3>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-3 signuphome">
                <form role="form" action="{{url('/register')}}" method="post" class="login-form">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <input type="text" name="name" placeholder="Your full name" class="form-username form-control" id="form-username" value="{{old('name')}}">

                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <input type="email" name="email" placeholder="Email" class="form-username form-control" id="form-username" value="{{old('email')}}">

                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <input type="password" name="password" placeholder="Password" class="form-password form-control" id="form-password">

                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <input type="password" name="password_confirmation" placeholder="Confirmed Password" class="form-password form-control" id="form-password">

                    </div>
                    <button type="submit" class="btn">
                        <i class="fa fa-btn fa-user"> </i> Sign up!</button>
                </form>
            </div>
            <div class="col-sm-1">
                
            </div>

        </div>
    </div>
    </section>
    
    <section>
        <div class="row someFeatureOfMyGroup">

            <div class="col-sm-4 someFeature">
                <div>
                    <i class="fa fa-5x fa-group "></i>
                </div>
                <div>
                    <h3 >Group Creation</h3>
                    <p>Create a group for providing class lecture contents among the students </p>
                </div>
            </div>
            <div class="col-sm-4 someFeature">
                <div>
                    <i class="fa fa-5x fa-newspaper-o"></i>
                </div>
                <div>
                    <h3 >Assignment Submitting</h3>
                    <p>Assigning tasks can be uploaded through this software </p>
                </div>
            </div>

            <div class="col-sm-4 someFeature">
                <div>
                    <i class="fa fa-5x fa-dashboard"></i>
                </div>
                <div>
                    <h3 class="">Discussion</h3>
                    <p>Students can discuss their problem by using this application </p>
                </div>
            </div>

        </div>



        <div class="row someFeatureOfMyGroup">

            <div class="col-sm-4 someFeature">
                <div>
                    <i class="fa fa-5x fa-files-o "></i>
                </div>
                <div>
                    <h3 >Uploading files</h3>
                    <p>Teachers can upload the class lectures and student will get that contents  </p>
                </div>
            </div>
            <div class="col-sm-4 someFeature">
                <div>
                    <i class="fa fa-5x fa-envelope-o"></i>
                </div>
                <div>
                    <h3 >Mail Notification</h3>
                    <p>After posting any resources , students will receive a notification message </p>
                </div>
            </div>

            <div class="col-sm-4 someFeature">
                <div>
                    <i class="fa fa-5x fa-calendar-o"></i>
                </div>
                <div>
                    <h3 class="">Presentation Topics</h3>
                    <p>Students can see all presentations topics and can submit it </p>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
