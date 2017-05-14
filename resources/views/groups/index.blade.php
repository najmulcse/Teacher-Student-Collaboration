@extends('layouts.homeLayout')

@section('group_heading')
              <h2 class="page-header">
                   <a href="{{ route('id',['id' => $group->id]) }}">{{ $group->group_name }}</a> 
                   <small></small>
             </h2>
@endsection
@section('group_body')


<section>



    <div class="row">
        <div class="col-sm-9">
        <div class="row">
        <div class="col-sm-1">
                <figure>
                  <img class="img-responsive" src="img/author.jpg">
                </figure>
                <label>{{ $user->name }}</label>
         </div>
         <div class="col-sm-11">
                    <h2>Lecture Title #</h2>
                    <span> <label>date:01-03-2017</label>
                    </span>

                    <p>All the Slides of CSE4221 Course
        All the slides of CSE4221 Course are attached along with this post. Those are in 2 ZIP files that are in accordance of Part A and Part B.
        Part A contains the following chapters:

        Chapter 1
        Chapter 2
        Chapter 7
        Chapter 8
        Chapter 9
        Part B contains the following chapters:

        Chapter 6
        Chapter 11
        Chapter 12
        Chapter 15
        M-Commerce (On the Topic of Chapter 6)
        I will provide you with some other slides or resources, if I can prepare them for the following topics:

        Front End Development or Client Side Programming (Part A)
        Back End Development or Server Side Programming (Part A)
        PHP & MySQL (Part B)
        MVC or PHP Frameworks (Part B)</p>
                </div>
          </div>
          <div class="row">
        <div class="col-sm-1">
                <figure>
                  <img class="img-responsive" src="img/naj.jpg">
                </figure>
                <label>Kamal Hossain</label>
         </div>
         <div class="col-sm-11">
                    <h2>Lecture Title # </h2>
                    <span> <label>date:01-03-2017</label>
                    </span>

                    <p>All the Slides of CSE4221 Course
        All the slides of CSE4221 Course are attached along with this post. Those are in 2 ZIP files that are in accordance of Part A and Part B.
        Part A contains the following chapters:

        Chapter 1
        Chapter 2
        Chapter 7
        Chapter 8
        Chapter 9
        Part B contains the following chapters:

        Chapter 6
        Chapter 11
        Chapter 12
        Chapter 15
        M-Commerce (On the Topic of Chapter 6)
        I will provide you with some other slides or resources, if I can prepare them for the following topics:

        Front End Development or Client Side Programming (Part A)
        Back End Development or Server Side Programming (Part A)
        PHP & MySQL (Part B)
        MVC or PHP Frameworks (Part B)</p>
                </div>
          </div>

        </div>
        <div class="col-sm-3">

                <div class="row">
                       <div class="col-sm-12">
                                 <div class="right_sidebar">
                                <!-- Sidebar -->
                                    <div class="w3-sidebar w3-bar-block w3-card-2" style="width:18%;right:0;padding-top: 0px;">
                                   <!--   <a href="{{url('/create')}}" class="create_group_button">Create new group</a> -->
                                 
                                   @if( $user-> user_type_id == 1 && $user->id == $group->user_id)
                                        <a href="{{route('createPost',['gid' =>$group->id])}}" class="w3-bar-item w3-button">Create a post</a>
                                          <a href="{{ route('createLecture',['id'=>$group->id]) }}" class="w3-bar-item w3-button">Lecture Upload </a>
                                          <a href="#" class="w3-bar-item w3-button">Assignment Upload</a>
                                    @elseif( $user->user_type_id == 2 || $user-> user_type_id == 1)
                                          <a href="{{route('createPost',['gid' =>$group->id])}}" class="w3-bar-item w3-button">Create a post</a>
                                    @endif


                                    </div>
                                </div>



                            </div>
                     </div>
                </div>
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
