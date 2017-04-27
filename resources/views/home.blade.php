@extends('layouts.homeLayout')


@section('group_body')

       <section>         <!-- Contents body started -->
                <div class="row">
                    <div class="col-sm-9">                      
                            <table class="table table-border table-hover">
                                <thead>
                                    <tr>
                                        <th class="">Group Name</th> 
                                        <th class="">Short Description</th>
                                        <th class="pull-right">Options</th>
                                        
                                    </tr>
                                </thead>

                                    <tbody>
                                        <tr>
                                        <td> <a href="{{ url('/group') }}">Software Engineering</a></td>
                                        <td><p  href="#">Software is made by programmers</p></td>
                                        <td><ul class="nav navbar-nav navbar-right">
                                            <li class="dropdown">
                                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                   <span class=""><i class="fa fa-gear"></i></span>
                                              </a>

                                              <ul class="dropdown-menu" role="menu">
                                                  <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>edit</a></li>
                                                  <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>delete</a></li>
                                             </ul>
                                         </li>
                                      </ul>
                                      </td>
                                        </tr>
                                         <tr>
                                        <td> <a href="{{ url('/group') }}">Software Engineering</a></td>
                                        <td><p  href="#">Software is made by programmers</p></td>
                                        <td><ul class="nav navbar-nav navbar-right">
                                            <li class="dropdown">
                                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                   <span class=""><i class="fa fa-gear"></i></span>
                                              </a>

                                              <ul class="dropdown-menu" role="menu">
                                                  <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>edit</a></li>
                                                  <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>delete</a></li>
                                             </ul>
                                         </li>
                                      </ul>
                                      </td>
                                        </tr>
                                         <tr>
                                        <td> <a href="{{ url('/group') }}">Software Engineering</a></td>
                                        <td><p  href="#">Software is made by programmers</p></td>
                                        <td><ul class="nav navbar-nav navbar-right">
                                            <li class="dropdown">
                                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                 <span class=""><i class="fa fa-gear"></i></span>
                                              </a>

                                              <ul class="dropdown-menu" role="menu">
                                                  <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>edit</a></li>
                                                  <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>delete</a></li>
                                             </ul>
                                         </li>
                                      </ul>
                                      </td>
                                        </tr>
                                    
                                    </tbody>
                           </table>
                        
                    </div>
                    <div class="col-sm-3">
                        <div>
                        <a href="{{url('/create')}}" class="create_group_button">Create new group</a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
          
        </section>  

@endsection

