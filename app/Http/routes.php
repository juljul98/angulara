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
    return view('index');
});
Route::get('/employees/{id?}', 'EmployeesController@index');
Route::post('/employees', 'EmployeesController@store');
Route::post('/employees/{id}', 'EmployeesController@update');
Route::delete('/employees/{id}', 'EmployeesController@destroy');
Route::auth();

Route::get('/home', 'HomeController@index');
