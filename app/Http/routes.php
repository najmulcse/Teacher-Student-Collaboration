<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::group(['middlewaregroups' => ['web']], function () {

    Route::get('/', function () {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('welcome');
    });

    // For group controlling , all the methods are defined in the GroupController 

    Route::get('/group/{id}', ['as'=>'id','uses'=>'GroupController@index']);
    Route::get('/group/{id}/edit',['as'=>'group_id','uses'=>'GroupController@edit']);
    Route::patch('/group/{id}/update',['as'=>'update','uses'=>'GroupController@update']);
    Route::get('/create',['as'=>'create','uses'=>'GroupController@create']);
    Route::post('/store',['as'=>'store','uses'=>'GroupController@store']);
    Route::get('group/{id}/delete',['as'=>'group_deleted_id','uses'=>'GroupController@delete']);
    Route::get('/joinGroup',['as' => 'joinGroupid', 'uses' => 'GroupController@joinGroup']);
    Route::post('/checkGroup' , [ 'as' => 'checkGroup','uses' => 'GroupController@checkGroupForJoining']);
    Route::get('leftgroup/{gid}/{mid}',['as' => 'left_group', 'uses' => 'GroupController@leftGroup' ]);


    //PostController routes are started here

    Route::get('group/{gid}/createPost',['as' => 'createPost','uses' => 'PostController@createPost']);
    Route::post('group/{gid}/storePost',['as' =>'storePost', 'uses' =>'PostController@storePost']);
    Route::get('group/{gid}/allPosts', ['as' => 'allPosts' ,'uses' => 'PostController@allPosts']);
    Route::get('group/{gid}/post/{type}/{pid}/edit',['as' => 'edit_post' ,'uses' => 'PostController@edit']);
    Route::patch('group/{gid}/post/{type}/{pid}/update',['as' => 'updatePost', 'uses' =>'PostController@update']);
    Route::get('group/{gid}/post/{pid}/delete', ['as' => 'post_deleted', 'uses' => 'PostController@delete']);
    Route::get('download/{file}',['as' => 'download' , 'uses' => 'PostController@download']);

    Route::get('group/{gid}/allLectures',['as' => 'allLectures' , 'uses' => 'PostController@allLectures']);
    Route::get('group/{gid}/createLecture',['as' => 'createLecture','uses' => 'PostController@createLecture']);
    Route::post('group/Lecture/store',['as' => 'storeLecture','uses' => 'PostController@storeLecture']);


    //Assignments related routes are here

    Route::get('group/{gid}/allAssignments',['as' => 'allAssignments' , 'uses' => 'PostController@allAssignments']);
    Route::get('group/{gid}/createAssignment',['as' => 'createAssignment' ,'uses' =>'PostController@createAssignment']);
    Route::post('group/{gid}/storeAssignment',['as' => 'storeAssignment' ,'uses' =>'PostController@storeAssignment']);
    Route::get('group/{gid}/{type}/{pid}/assignment/submit',['as' => 'submitAssignment' ,'uses' =>'PostController@submitAssignment']);
    Route::post('group/assignment/store',['as' =>'submitByStudent','uses' => 'PostController@assignmentSubmitByStudent']);
    // Route::get('group/submittedAssinment/{gid}/show',['as'=> 'allreadysubmittedAssignment','uses' => 'PostController@allreadysubmittedAssignment']);

    //PostController routes are ended 



    //CommentController routes are started from here
    Route::post('group/{gid}/post/{pid}/comment/{type}/store',['as' => 'post_comment' ,'uses' =>'CommentController@store']);


    //EmailController routes are started from here

    Route::get('emailCreate/{gid}',['as' => 'emailCreate', 'uses' => 'EmailController@emailCreate']);
    Route::post('send',['as' => 'send', 'uses' => 'EmailController@send']);


   //HomeController routes are started from here

    Route::auth();

    Route::get('/home', ['as'=>'home', 'uses'=>'HomeController@index'] );
    
//unused till now
    Route::get('/admin/grouphome', function () {
        return view('admin.grouphome');
    });
    Route::get('/admin/index', function () {
        return view('admin.Adminindex');
    });

    

});


//The purpose of these routes is for testing some features 
Route::get('test1/{id}',['as' => 'test1' ,'uses' => 'CommentController@test1']);
Route::post('test2',['as' =>'test2' ,'uses' => 'CommentController@test2']);
//Teacher activities ...
Route::get('/pagenotfound',function(){
    return view('errors.empty');
});

Route::get('teacher/',function (){
        return view('teachers.indexTeacher');
});
Route::get('blank/',function(){
        return view('blank');
});