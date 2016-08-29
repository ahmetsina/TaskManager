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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();


Route::get('/tasks','TaskController@index');
Route::get('/addTasks','TaskController@create');
Route::post('/task','TaskController@store');
Route::get('/profile','UserController@index');
Route::put('/profile',['as' => 'profile.update' , 'uses' => 'UserController@update']);
Route::get('/users', function(){

        $users = App\User::all(array('id', 'name', 'email'));

    return Response::json(array(
        'error' => false,
        'users' => $users,
        'status_code' => 200
    ));
});
Route::get('/users/{id?}', function($id = null){

    if($id !== null) {
        $users = App\User::find($id, array('id', 'name', 'email'));
    }


    return Response::json(array(
        'error' => false,
        'users' => $users,
        'status_code' => 200
    ));
});
Route::get('/users/{id?}/name', function($id = null){

    if($id !== null) {
        $users = App\User::find($id, array('name'));
    }


    return Response::json(array(
        $users
    ));
});
Route::delete('/task/{task}','TaskController@destroy');
Route::get('/home', 'HomeController@index');

Route::get('/image', function()
{
    $img = Image::make('foo.png')->resize(900, 600);


    return $img->response('jpg');
});
//Route::delete('/task/{tasks}','TaskController@destroy');
