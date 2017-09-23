<?php

if(count($comments)>0)  
{ 
    $count = 1;
    $outputhead = '';
    $outputbody = '';  
    $outputtail ='';

    $outputhead .= '<div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Group</th>
                                <th>Post</th>
                                <th>User</th>
                                <th>Body</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                ';
                  
    foreach ($comments as $comment)    
    {   
    $body = substr(strip_tags($comment->comment),0,50)."...";
    
    $outputbody .=  ' 
                
                            <tr id='.$comment->id.'> 
		                        <td>'.$comment->id.'</td>
		                        <td>'.$comment->group_id.'</td>
		                        <td>'.$comment->post_id.'</td>
                                <td>'.$comment->user->name.'</td>
                                <td>'.$body.'</td>
                                <td ><a href="#" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                <td >
                                    <button class="btn btn-danger delete-task delete-modal" value='.$comment->id.'><i class="fa fa-trash" aria-hidden="true"></i>
                                     </button>
                                </td>
                            </tr> 
                    ';
                
    }  

    $outputtail .= ' 
                        </tbody>
                    </table>
                </div>';
         
    echo $outputhead; 
    echo $outputbody; 
    echo $outputtail; 
 }  
 
 else  
 {  
    echo '<h1> Data Not Found !!!</h1>';  
 } 

 ?>