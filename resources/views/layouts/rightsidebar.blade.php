<div class="row">
                       <div class="col-sm-12">
                                 <div class="right_sidebar">
                                <!-- Sidebar -->
                                    <div class="w3-sidebar w3-bar-block w3-card-2" style="width:18%;right:0;padding-top: 0px;">
                                   <!--   <a href="{{url('/create')}}" class="create_group_button">Create new group</a> -->
                                 
                                   @if( $user-> user_type_id == 1 && $user->id == $group->user_id)
                                        <a href="{{route('createPost',['gid' => $group->id])}}" class="w3-bar-item w3-button">Create a post</a>
                                          <a href="{{ route('allPosts',['gid' => $group->id])}}" class="w3-bar-item w3-button">All Posts</a>
                                          <a href="{{ route('createLecture',['id'=>$group->id]) }}" class="w3-bar-item w3-button">Lecture Upload </a>
                                          <a href="{{ route('allLectures',['gid'=>$group->id ]) }}" class="w3-bar-item w3-button">All Lectures</a>
                                          
                                          <a href="#" class="w3-bar-item w3-button">Assignment Upload</a>

                                    @elseif( $user-> user_type_id == 1 )
                                          <a href="{{route('createPost',['gid' =>$group->id])}}" class="w3-bar-item w3-button">Create a post</a>
                                          <a href="{{ route('allPosts',['gid' => $group->id])}}" class="w3-bar-item w3-button">All Posts</a>
                                   
                                    @elseif( $user->user_type_id == 2 )
                                          <a href="{{route('createPost',['gid' =>$group->id])}}" class="w3-bar-item w3-button">Create a post</a>
                                          <a href="{{ route('allPosts',['gid' => $group->id])}}" class="w3-bar-item w3-button">All Posts</a>
                                          
                                    @endif


                                    </div>
                                </div>



                            </div>
                     </div>