@extends('layouts.homeLayout')

@if($count==0)
  
    @section('group_heading')
                  <h2 class="page-header">
                       You have no group!
                 </h2>

    @endsection
@else
    @section('group_heading')
                  <h2 class="page-header">
                        All Groups <span class="small"> (You have {{$count}} groups)</span>
                 </h2>

    @endsection
    @section('group_body')

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
                                   @foreach($groups as $group)
               
                                            <tr>
                                            <td> <a href="{{ url('/group') }}"> {{ $group->group_name }}</a></td>
                                            <td>{{$group->course_code}}</td>
                                            <td><p  href="#">{{$group->short_description}}</p></td>
                                            <td><ul class="nav navbar-nav navbar-right">
                                                <li class="dropdown">
                                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                       <span class=""><i class="fa fa-cog"></i></span>
                                                  </a>

                                                  <ul class="dropdown-menu" role="menu">
                                                      <li><a href="{{ route('group_id',['id'=>$group->id]) }}"><i class="fa fa-pencil fa-fw"></i>edit</a></li>
                                                      <li><a href="{{ route('group_deleted_id',['id'=>$group->id]) }}"><i class="fa fa-trash-o fa-fw"></i>delete</a></li>
                                                      <li><button class="btn btn-sm"><span class=""><i class="fa fa-cog fa-fw"></i></span>  Settings</button></li>
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
                          <!--   <div>
                            <a href="{{url('/create')}}" class="create_group_button">Create new group</a>
                            </div> -->
                        </div>
                    </div>
                    <!-- /.row -->
              
            </section>  

    @endsection

@endif

