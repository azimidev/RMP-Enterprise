<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('', [ 'uses' => 'ExportController@welcome', 'as' => 'home'] );
Route::get('view', [ 'uses' => 'ExportController@viewStudents', 'as' => 'view'] );
Route::post('export', [ 'uses' => 'ExportController@export', 'as' => 'export'] );

// Optional extra
Route::get('view-vue', [ 'uses' => 'ExportController@viewStudentsWithVue', 'as' => 'view-vue'] );
