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
    Route::get('/group', function () {
        return view('groups.index');
    });
    Route::get('/groups/create', function () {
        return view('groups.create');
    });
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
Route::get('group/',function(){
        return view('groups.index');
});