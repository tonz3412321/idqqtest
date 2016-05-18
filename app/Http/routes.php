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

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/users', 'UserController@index');
Route::get('/users/data', 'UserController@indexData');
Route::get('/users/{id}/delete', 'UserController@destroy');


Route::get('/users/create',['as' => 'user.create' , 'uses' => 'UserController@create']);
Route::post('/users/store', ['as' => 'user.store' , 'uses' => 'UserController@store']);


Route::get('/student/create',['as' => 'student.create' , 'uses' => 'StudentController@create']);
Route::post('/student/store', ['as' => 'student.store' , 'uses' => 'StudentController@store']);


Route::get('/student/{id}/edit', ['as' => 'student.edit' , 'uses' => 'StudentController@edit']);
Route::post('/student/{id}/update', ['as' => 'student.update' , 'uses' => 'StudentController@update']);
Route::get('/student/{id}/delete', ['as' => 'student.delete' , 'uses' => 'StudentController@destroy']);

Route::get('/students/report/{age1}/{age2}', ['as' => 'student.report' , 'uses' => 'StudentController@report']);


Route::get('/students', ['as' => 'student.manage' , 'uses' => 'StudentController@index']);
Route::post('/students/data', ['as' => 'student.data' , 'uses' => 'StudentController@indexData']);
