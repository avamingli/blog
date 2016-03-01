<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('user/{name?}',function ($name = 'name'){
    return 'Hello zhang'.$name;
});
 */

Route::get('/','ArticleController@index');
Route::get('articles/{id}','ArticleController@show');
Route::get('article/create','ArticleController@create');
Route::post('article/store','ArticleController@store');
Route::get('article/edit/{id}','ArticleController@edit');
Route::post('article/update','ArticleController@update');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
