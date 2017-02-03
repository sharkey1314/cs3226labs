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

// nicer one stop view of all routes
Route::get('/', 'StudentController@index');

Route::get('student/{id}', 'StudentController@detail');

Route::get('help', function() { return view('help'); });

?>
