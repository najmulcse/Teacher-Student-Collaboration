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




Route::group(['middleware' => ['web']], function () {

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



    //PostController routes are started here

    Route::get('/group/{gid}/createPost',['as' => 'createPost','uses' => 'PostController@createPost']);
    Route::post('group/{gid}/storePost',['as' =>'storePost', 'uses' =>'PostController@storePost']);
    Route::get('group/{gid}/allPosts', ['as' => 'allPosts' ,'uses' => 'PostController@allPosts']);
    Route::get('group/{gid}/post/{type}/{pid}/edit',['as' => 'edit_post' ,'uses' => 'PostController@edit']);
    Route::patch('group/{gid}/post/{type}/{pid}/update',['as' => 'updatePost', 'uses' =>'PostController@update']);
    Route::get('group/{gid}/post/{pid}/delete', ['as' => 'post_deleted', 'uses' => 'PostController@delete']);
    Route::get('download/{file}',['as' => 'download' , 'uses' => 'PostController@download']);


    //PostController routes are ended 


    //LectureController routes are  started here
    Route::get('group/{gid}/allLectures',['as' => 'allLectures' , 'uses' => 'LectureController@allLectures']);
     Route::get('group/{id}/createLecture',['as' => 'createLecture','uses' => 'LectureController@createLecture']);
    Route::post('group/{gid}/store',['as' => 'storeLecture','uses' => 'LectureController@storeLecture']);

    //LectureController routes are  ended


//unused till now
    Route::get('/admin/grouphome', function () {
        return view('admin.grouphome');
    });
    Route::get('/admin/index', function () {
        return view('admin.Adminindex');
    });

    Route::auth();

    Route::get('/home', ['as'=>'home', 'uses'=>'HomeController@index'] );

});


//Teacher activities ...


Route::get('teacher/',function (){
        return view('teachers.indexTeacher');
});
// Route::get('group/',function(){
//         return view('groups.index');
// });