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
Route::delete('/task/{task}','TaskController@destroy');
Route::get('/home', 'HomeController@index');
Route::get('/foo', function () {
    return '<h1>Hello World</h1>';
});
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});

Route::get('posts/{post?}', function ($post = null) {
    return "<h1>Post : ".$post;
});
//Route::delete('/task/{tasks}','TaskController@destroy');

