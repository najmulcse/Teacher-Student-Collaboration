<?php

if(count($groups)>0)  
{ 
    $count = 1;
    $outputhead = '';
    $outputbody = '';  
    $outputtail ='';

    $outputhead .= '<div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Group</th>
                                <th>Description</th>
                                <th>Code</th>
                                <th>Course</th>
                                <th>Author</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                ';
                  
    foreach ($groups as $group)    
    {   
    $body = substr(strip_tags($group->short_description),0,50)."...";
    
    $outputbody .=  ' 
                
                            <tr id='.$group->id.'> 
		                        <td>'.$group->id.'</td>
		                        <td>'.$group->group_name.'</td>
		                        <td>'.$group->body.'</td>
                                <td>'.$group->group_code.'</td>
                                <td>'.$group->course_code.'</td>
                                <td>'.$group->user->name.'</td>
                                <td ><a href="#" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                <td >
                                    <button class="btn btn-danger delete-task delete-modal" value='.$group->id.'><i class="fa fa-trash" aria-hidden="true"></i>
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