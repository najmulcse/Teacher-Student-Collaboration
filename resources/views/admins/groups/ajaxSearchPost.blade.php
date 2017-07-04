<?php

if(count($posts)>0)  
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
                                <th>Author</th>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                ';
                  
    foreach ($posts as $post)    
    {   
    $body = substr(strip_tags($post->body),0,50)."...";
    
    $outputbody .=  ' 
                
                            <tr id='.$post->id.'> 
		                        <td>'.$post->id.'</td>
                                <td>'.$post->group_id.'</td>
		                        <td>'.$post->user->name.'</td>
		                        <td>'.$post->type.'</td>
                                <td>'.$post->title.'</td>
                                <td>'.$post->body.'</td>
                                <td ><a href="#" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                <td >
                                    <button class="btn btn-danger delete-task delete-modal" value='.$post->id.'><i class="fa fa-trash" aria-hidden="true"></i>
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