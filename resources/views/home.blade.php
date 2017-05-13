@extends('layouts.homeLayout')
  @section('group_body')
@if($countM==0)

    @section('group_heading')
                  <h2 class="page-header">
                       You have no group!
                 </h2>

    @endsection
@else
    @section('group_heading')
                  <h2 class="page-header">
                        My Groups <span class="small"> (You have {{$countM}} groups)</span>
                 </h2>

    @endsection

  


           <section>         <!-- Contents body started -->
                    <div class="row">
                        <div class="col-sm-9">
                                <table class="table table-border table-hover">
                                    <thead>
                                        <tr>
                                            <th>Group Name</th>
                                            <th> Course Code</th>
                                            <th>Short Description</th>
                                            <th>Options</th>

                                        </tr>
                                    </thead>

                                        <tbody>
                                  <!--loop started for finding group contents-->
                                   @foreach($myGroups as $group)

                                            <tr>
                                            <td> <a href="{{ route('id',['id' => $group->id]) }}"> {{ $group->group_name }}</a></td>
                                            <td>{{$group->course_code}}</td>
                                            <td><p  href="#">{{$group->short_description}}</p></td>
                                            <td><ul class="nav navbar-nav navbar-right">
                                                <li class="dropdown">
                                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                       <span class=""><i class="fa fa-cog"></i></span>
                                                  </a>

                                                  <ul class="dropdown-menu" role="menu">
                                                      <li><a href="{{ route('group_id',['id'=>$group->id]) }}"><i class="fa fa-pencil fa-fw"></i>Edit</a></li>

                                                     <li><a onclick="return confirm('are you sure?')" href="{{ route('group_deleted_id',['id'=>$group->id]) }}"><i class="fa fa-trash-o fa-fw"></i>Delete</a></li>
                                                      <li><a href="#"><span class=""><i class="fa fa-plus fa-fw"></i></span>Add member</a></li>

                                                      

                                                 </ul>
                                             </li>
                                          </ul>
                                          </td>
                                            </tr>
                                             @endforeach
                                             <!--loop ended for finding group contents-->

                                        </tbody>
                               </table>

                        </div>

                       
                        <div class="col-sm-3">
                          
                        </div>
                    </div>
                    <!-- /.row -->

            </section>

@endif

@if($countJ==0)

                  <h2 class="page-header">
                       You have no joined group!
                 </h2>

@else
   
                  <h2 class="page-header">
                         Joined Groups <span class="small"> (You have {{$countJ}} joined groups)</span>
                 </h2>

            <section>         <!-- Contents body started -->
                    <div class="row">
                        <div class="col-sm-9">
                                <table class="table table-border table-hover">
                                    <thead>
                                        <tr>
                                            <th>Group Name</th>
                                            <th> Course Code</th>
                                            <th>Short Description</th>
                                            <th>Options</th>

                                        </tr>
                                    </thead>

                                        <tbody>
                                  <!--loop started for finding group contents-->
                                   @foreach($joinedGroups as $groupJ)
                                            <tr>
                                            <td> <a href="{{ route('id',['id' => $groupJ->id]) }}"> {{ $groupJ->group_name }}</a></td>
                                            <td>{{$groupJ->course_code}}</td>
                                            <td><p  href="#">{{$groupJ->short_description}}</p></td>
                                            <td><ul class="nav navbar-nav navbar-right">
                                                <li class="dropdown">
                                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                       <span class=""><i class="fa fa-cog"></i></span>
                                                  </a>

                                                  <ul class="dropdown-menu" role="menu">
                                                     
                                                      <li><a href="#"><span class=""><i class="fa fa-minus fa-fw"></i></span>Left group</a></li>

                                                      

                                                 </ul>
                                             </li>
                                          </ul>
                                          </td>
                                            </tr>
                                             @endforeach
                                             <!--loop ended for finding group contents-->

                                        </tbody>
                               </table>

                        </div>

                      
                     
                        
                        <div class="col-sm-3">
                        
                        </div>
                    </div>
                    <!-- /.row -->

            </section>


@endif

@endsection

<!--for joined groups -->





