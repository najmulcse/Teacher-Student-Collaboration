@extends('layouts.app')


@section('content')
    <!--Admin sidebar -->
<section>
    <div class="row">
        <div class="col-sm-3">
        @include('layouts.adminsidebar');
        </div>
  <!-- admin group contents-->

        <div class="col-sm-9 ">
            <form action="#">

            <h1 class="">Group Name</h1>
                   <button> Lecture Upload</button>
                    <button>Assignment</button>
            <div class="row">
                <div class="col-sm-8 postbackground">
                    <textarea class="form-control" name="course_lecture" rows="4" placeholder="Write here..."></textarea>
                    <button class="btn btn-default pull-right">Post</button>
                </div>
                <div class="col-sm-4">

                </div>
            </div>
            </form>
        </div>
        </div>
    </section>
@endsection