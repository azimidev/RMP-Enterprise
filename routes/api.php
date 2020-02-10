<?php

// Optional extra
Route::group(['middleware' => 'auth:api', 'prefix' => 'export'], function() {
	Route::post('students', 'ExportController@exportStudentsToCsvWithVue');
	Route::post('course-attendance', 'ExportController@exportCourseAttendenceToCsvWithVue');
});
