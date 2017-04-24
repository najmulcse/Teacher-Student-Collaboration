@extends('layouts.homeLayout')


@section('group_body')


<section>
    <h1>Previous posts </h1>

    <div class="row">
        <div class="col-sm-9">
            <h2>Lecture 1 posted </h2>
            <span> <label>date:01-03-2017</label>
            </span>
        </div>
        
        <div class="col-sm-3">
       
          <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-file"></i>Upload file</a>
                    </li>
                    
                    <li>
                         <a href="#"><i class="fa fa-fw fa-upload"></i>Create Post</a>
                    </li>
                    
                </ul>
            </div>
      
        </div>
    </div>
        
   
</section>

</div>
@endsection
