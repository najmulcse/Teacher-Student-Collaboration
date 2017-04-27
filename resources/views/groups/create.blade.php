@extends('layouts.homeLayout')
@section('title')

    <title> TS | Home</title>

@endsection
@section('group_body')
   
<section>
    <div class="row">
    <div class="col-sm-1"></div>
        <div class="col-sm-6">
          <div class="">
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

                    <button type="submit" class="btn pull-right btn-success">
                        <i class="fa fa-btn fa-user"> </i> Create group!</button>
                </form>
            </div>

        </div>
        <div class="col-sm-2"></div>
        
        <div class="col-sm-3">  
                <div class="row"> 
                    <div class="col-sm-12">
                        <a href="{{url('/create')}}" class="create_group_button">Create new group</a>
                     </div>  
                </div>   
                <div class="row">
               
                    <div class="col-sm-12">
                        
                    </div>
                </div>      
         </div>      
    
    </div>

        

</section>


@endsection