<?php

Route::get('', [ 'uses' => 'ExportController@welcome', 'as' => 'home'] );
Route::get('view', [ 'uses' => 'ExportController@viewStudents', 'as' => 'view'] );
Route::post('export', ['uses' => 'ExportController@export', 'as' => 'export']);

Route::post('export-course-attendance', [
	'uses' => 'ExportController@exportCourseAttendenceToCSV',
	'as'   => 'export.course.attendance',
]);

// Optional extra
Route::get('view-vue', [ 'uses' => 'ExportController@viewStudentsWithVue', 'as' => 'view-vue'] );
