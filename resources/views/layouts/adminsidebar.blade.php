
<div class="sidebar-left">
    <div class="sidebar">

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">New Group</button>


                <!-- Modal -->
                <div class="modal " id="myModal" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Create New Group</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('admin/grouphome')}}" method="post">
                                    <div class="form-group">
                                        <label class="pull-left">Group Name *</label>
                                        <input class="form-control" name="groupname" placeholder="Enter group name">
                                    </div>
                                    <div class="form-group">
                                        <label class="pull-left">Course name *</label>
                                        <input class="form-control" name="coursename" placeholder="Enter course name" >
                                    </div>
                                    <div class="form-group">
                                        <label class="pull-left">Year *</label>

                                        <select class="form-control">
                                            <option>Select year</option>
                                            <option>1st</option>
                                            <option>2nd</option>
                                            <option>3rd</option>
                                            <option>4th</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="pull-left">Short description about group</label>
                                        <textarea class="form-control" name="short_description" rows="3" placeholder="Description"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" >Create group</button>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-default" style="background-color: white; color: black" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Layout Options</span>
                        <span class="label label-primary pull-right">4</span>
                    </a>
                    <ul class="treeview-menu" style="display: none;">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Boxed</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Fixed</a></li>
                        <li class=""><a href="#"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-th"></i> <span>Widgets</span>
                        <small class="label pull-right label-info">new</small>
                    </a>
                </li>


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</div>

