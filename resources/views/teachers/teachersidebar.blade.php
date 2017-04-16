


<div class="collapse navbar-collapse" id="app-navbar-collapse">

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">

            <button class="btn btn-default" data-toggle="modal" data-target="#myModal"> New Group </button>

            <!-- Modal -->
            <div class="modal" id="myModal" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Create New Group</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('')}}" method="post">
                                <div class="form-group">
                                    <label >Group Name *</label>
                                    <input class="form-control" name="groupname" placeholder="Enter group name">
                                </div>
                                <div class="form-group">
                                    <label >Course name *</label>
                                    <input class="form-control" name="coursename" placeholder="Enter course name" >
                                </div>
                                <div class="form-group">
                                    <label >Year *</label>

                                    <select class="form-control">
                                        <option>Select year</option>
                                        <option>1st</option>
                                        <option>2nd</option>
                                        <option>3rd</option>
                                        <option>4th</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Short description about group</label>
                                    <textarea class="form-control" name="short_description" rows="3" placeholder="Description"></textarea>
                                </div>


                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >Create group</button>
                        </div>
                    </div>
                </div>
            </div>  <!-- Modal end-->

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v "></i> Groups <i class="fa fa-fw fa-caret-down pull-right"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="#">Group 1</a>
                    </li>
                    <li>
                        <a href="#">Group 2</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i>Profile</a>
            </li>

        </ul>
    </div>

<!-- /.navbar-collapse -->

</div>

