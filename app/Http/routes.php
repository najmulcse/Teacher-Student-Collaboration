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


//---------------------------------------------------//

Route::group(['middlewaregroups' => ['web']], function () {

    Route::get('/', function () {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('welcome');
    });


//-------------------------------
//Searching......
   Route::post('/result',['as'=>'group.searching', 'uses'=>'GroupController@searching']);

//-------------------------------
//register route 

Route::get('registerTeacher',['as'=>'registerTeacher','uses'=>'MyLogController@registerTeacher']);
Route::post('storeTeacherInfo',['as'=>'storeTeacherInfo','uses'=>'MyLogController@storeTeacherInfo']);


Route::get('registerStudent',['as'=>'registerStudent','uses'=>'MyLogController@registerStudent']);
Route::post('storeStudentInfo',['as'=>'storeStudentInfo','uses'=>'MyLogController@storeStudentInfo']);


//-------------------------------------------------------------
//------UserManagement routes are started here (HomeController)-------

Route::get('password_changed',['as'=>'changed.password', 'uses' =>'HomeController@changedPassword']);
Route::post('password_changed',['as'=>'store.password', 'uses' =>'HomeController@storePassword']);
Route::get('add_photo',['as'=>'add.photo', 'uses' =>'HomeController@addPhoto']);
Route::post('add_photo',['as'=>'store.photo', 'uses' =>'HomeController@storePhoto']);


//----------------UserManagement routes ended--------------------

//---------------------------------------------------------------//
    // For group controlling , all the methods are defined in the GroupController 

    Route::get('/group/{id}', ['as'=>'id','middleware'=>'group','uses'=>'GroupController@index']);
    Route::get('/group/{id}/edit',['as'=>'group_id','uses'=>'GroupController@edit']);
    Route::patch('/group/{id}/update',['as'=>'update','uses'=>'GroupController@update']);
    Route::get('/create',['as'=>'create','uses'=>'GroupController@create']);
    Route::post('/store',['as'=>'store','uses'=>'GroupController@store']);
    Route::get('group/{id}/delete',['as'=>'group_deleted_id','uses'=>'GroupController@delete']);
    Route::get('/joinGroup',['as' => 'joinGroupid', 'uses' => 'GroupController@joinGroup']);
    Route::post('/checkGroup' , [ 'as' => 'checkGroup','uses' => 'GroupController@checkGroupForJoining']);
    Route::get('leftgroup/{gid}/{mid}',['as' => 'left_group', 'uses' => 'GroupController@leftGroup' ]);

//-----------------------------------------------------------//
    //PostController routes are started here

    Route::get('group/{gid}/createPost',['as' => 'createPost','uses' => 'PostController@createPost']);
    Route::post('group/{gid}/storePost',['as' =>'storePost', 'uses' =>'PostController@storePost']);
    Route::get('group/{gid}/allPosts', ['as' => 'allPosts' ,'uses' => 'PostController@allPosts']);
    Route::get('group/{gid}/post/{type}/{pid}/edit',['as' => 'edit_post' ,'uses' => 'PostController@edit']);
    Route::patch('group/{gid}/post/{type}/{pid}/update',['as' => 'updatePost', 'uses' =>'PostController@update']);
    Route::get('group/{gid}/post/{pid}/{type}/delete', ['as' => 'post_deleted', 'uses' => 'PostController@delete']);
    Route::get('download/{file}',['as' => 'download' , 'uses' => 'PostController@download']);

    Route::get('group/{gid}/allLectures',['as' => 'allLectures' , 'uses' => 'PostController@allLectures']);
    Route::get('group/{gid}/createLecture',['as' => 'createLecture','uses' => 'PostController@createLecture']);
    Route::post('group/Lecture/store',['as' => 'storeLecture','uses' => 'PostController@storeLecture']);

//-----------------------------------------------------------------------//
    //Assignments related routes are here

    Route::get('group/{gid}/allAssignments',['as' => 'allAssignments' , 'uses' => 'PostController@allAssignments']);
    Route::get('group/{gid}/createAssignment',['as' => 'createAssignment' ,'uses' =>'PostController@createAssignment']);
    Route::post('group/{gid}/storeAssignment',['as' => 'storeAssignment' ,'uses' =>'PostController@storeAssignment']);
    Route::get('group/{gid}/{type}/{pid}/assignment/submit',['as' => 'submitAssignment' ,'uses' =>'PostController@submitAssignment']);
    Route::post('group/assignment/store',['as' =>'submitByStudent','uses' => 'PostController@assignmentSubmitByStudent']);
    Route::get('group/submittedAssinment/{gid}/show',['as'=> 'submittedAssignments','uses' => 'PostController@submittedAssignments']);

    Route::get('downloadA/{file}',['as' => 'downloadA' , 'uses' => 'PostController@downloadA']);
  
    //PostController routes are ended 

//------------------------------------------------//

    //CommentController routes are started from here
    Route::post('group/{gid}/post/{pid}/comment/{type}/store',['as' => 'post_comment' ,'uses' =>'CommentController@store']);

    //CommentController routes are ended 


//------------------------------------------------//
    //EmailController routes are started from here

    Route::get('emailCreate/{gid}',['as' => 'emailCreate', 'uses' => 'EmailController@emailCreate']);
    Route::post('send',['as' => 'send', 'uses' => 'EmailController@send']);
   
    //EmailController routes ended

//-----------------------------------------------------//
   //HomeController routes are started from here

    Route::auth();

    Route::get('/home', ['as'=>'home', 'uses'=>'HomeController@index'] );
    
  //HomeController routes ended


//-----------------------------------------------------//


//unused till now
    

    Route::get('/assignmentFilter/{id}/{gid}',['as'=>'ajaxReq','uses' =>'PostController@assignmentFilter']);

});


//-----------------------------------------------------//

//AdminController routes are started ...


Route::group(['middleware' => ['auth','isAdmin']],function(){

        Route::get('admin',['as' => 'admin' , 'uses' => 'AdminController@index']);
        Route::get('admin/allgroups',['as'=> 'adminAllGroups','uses' =>'AdminController@allGroups']);
        Route::get('admin/allPosts',['as'=> 'adminGroupPosts','uses' =>'AdminController@groupPosts']);
        Route::get('admin/allComments',['as'=> 'adminGroupComments','uses' =>'AdminController@groupComments']);        
        //ajax calling 

        Route::get('admin/searchGroup',['as'=>'searchGroup','uses'=> 'AdminController@searchGroup']);
        Route::get('admin/deleteGroup',['as'=>'deleteGroup','uses'=> 'AdminController@deleteGroup']);
         Route::get('admin/searchPost',['as'=>'searchPost','uses'=> 'AdminController@searchPost']);
        Route::get('admin/deletePost',['as'=>'deletePost','uses'=> 'AdminController@deletePost']);
         Route::get('admin/searchComment',['as'=>'searchComment','uses'=> 'AdminController@searchComment']);
        Route::get('admin/deleteComment',['as'=>'deleteComment','uses'=> 'AdminController@deleteComment']);
    });



//-----------------------------------------------------//




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
Route::get('/blank',function(){
        return view('blank');
});

Route::post('/models',function(){
    if(Request::ajax())
    {
        return "ok";
    }
});

Route::get('test',array('as'=>'myform','uses'=>'HomeController@myform'));
Route::get('test/ajax/{id}',array('as'=>'myform.ajax','uses'=>'HomeController@myformAjax'));