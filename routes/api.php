<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Optional extra
Route::group(['middleware' => 'auth:api', 'prefix' => 'export'], function () {
    Route::post('students', 'ExportController@exportStudentsToCsvWithVue');
    Route::post('course-attendance', 'ExportController@exportCourseAttendenceToCsvWithVue');
});
