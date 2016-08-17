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

/*Route::any('matriphe/imageupload', function()
{
    $data = [];

    echo config('imageupload.library');

    if (Request::hasFile('file')) {
        $data['result'] = Imageupload::upload(Request::file('file'));
    }

    return view('form.blade.php')->with($data);
});*/


Route::get('/tasks','TaskController@index');
Route::get('/addTasks','TaskController@create');
Route::post('/task','TaskController@store');
Route::get('/profile','UserController@index');
Route::put('/profile',['as' => 'profile.update' , 'uses' => 'UserController@update']);

Route::delete('/task/{task}','TaskController@destroy');
Route::get('/home', 'HomeController@index');

Route::get('/image', function()
{
    $img = Image::make('foo.png')->resize(900, 600);

    return $img->response('jpg');
});
//Route::delete('/task/{tasks}','TaskController@destroy');
