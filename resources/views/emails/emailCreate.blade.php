
@extends('layouts.homeLayout')


@section('group_body')


  <div class="row">
      <div class="col-sm-9">
          <div class="row">
              <br>
              <br>
              <div class="panel panel-primary">
                   <div class="panel-heading">
                          Group member invitation
                    </div>
                    <div class="panel-body">
                            @if (session('message'))
                                <div class="alert alert-danger text-center">
                                    {{ session('message') }}
                                </div>
                            @endif</small>
                          <div class="col-sm-8 col-sm-offset-2">                          
                               <form action="{{route('send')}}" method="POST" enctype="multipart/form-data">
                                      {{ csrf_field() }}                                             
                                      <div class="form-group @if($errors->has('email')) has-error  @endif">     
                                           <label class="control-label">Email</label>
                                           <input type="email" name="email" class="form-control" placeholder="Enter Recipient Email Address" value="{{old('email')}}" >  
                                           {!! $errors->first('email','<span class="help-block">:message </span>')!!}
                                     </div>
                                     <div class="form-group">

                              	          <button type="submit" class="btn btn-sm btn-success pull-right">Send Invitation</button>	
                                    </div>
                              </form>
                             
                         </div>
                    </div>   
              </div>
          </div>
       

        </div>
        <div class="col-sm-3">

               <!--this page is extended from layouts -->
        </div>
  </div>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
@endsection
