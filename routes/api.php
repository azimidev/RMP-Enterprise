<?php

// Optional extra
Route::group(['middleware' => 'auth:api', 'prefix' => 'export'], function() {
	Route::post('students', 'ExportController@export');
	Route::post('course-attendance', 'ExportController@exportCourseAttendenceToCsv');
});
