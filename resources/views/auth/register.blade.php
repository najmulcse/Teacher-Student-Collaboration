@extends('layouts.app')

@section('content')

    <div class="top-content login_cover">

        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <!-- Heading need -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Signup to our site</h3>
                                <p>Enter your Email and Password to log on:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-lock"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
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
                    </div>
                </div>

            </div>
        </div>

    </div>




































@endsection
