@extends('layouts.groupHomeLayout')


@section('group_home_content')
<div class="container-fluid">
<section>
    
    <div class="row">
       <div class="col-sm-8"><h1 class="page-header"> <ol class="breadcrumb"> Group name  </ol>  </h1></div>
      <div class="col-sm-4">
         <form action="" method="">
              <div class="input-group col-md-12">
                  <input type="text" class="  search-query form-control" placeholder="Search" />
                  <span class="input-group-btn">
                  <button class="btn btn-danger" type="button">
                 <span class=" glyphicon glyphicon-search"></span>
                 </button>
                </span>
            </div>
        </form>
      </div>
    </div>
</section>

<section>
    <h1>Previous posts </h1>

    <div class="row">
        <div class="col-sm-6">
            <h2>Lecture 1 posted </h2>
            <span> <label>date:01-03-2017</label>
            </span>
        </div>
        <div class="col-sm-6">
        </div>
         </div>
         <div class="row">
        <div class="col-sm-6">
            <h2>Assignement 1 posted </h2>
            <span> <label>date:01-01-2017</label>
            </span>
        </div>
        <div class="col-sm-6">
        </div>
        </div>
        
   
</section>

</div>
@endsection
