<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('crud','student.index');
Route::get('student','StudentController@index');
Route::post('student','StudentController@store');
Route::delete('student/{student}','StudentController@destroy');
Route::post('student/{id}','StudentController@update');
Route::get('student/{id}','StudentController@show');

