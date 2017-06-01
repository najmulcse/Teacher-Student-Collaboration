@extends('layouts.homeLayout')

@section('group_heading')
              <h2 class="page-header">
                   <a href="{{ route('id',['id' => $group->id]) }}">{{ $group->group_name }}</a> 
                   <small> >>All Assignments </small>
             </h2>
@endsection
@section('group_body')


<section>
    <div class="row">
        <div class="col-sm-9">
       @if(count($assignments)>0)
         
       @else
           <h2>Currently empty!!!</h2>
       @endif        
        </div>

        <div class="col-sm-3">

                 @include('layouts.rightsidebar') <!--this page is extended from layouts -->
       </div>
   </div>

</section>

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


