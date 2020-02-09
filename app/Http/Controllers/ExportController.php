<?php

namespace App\Http\Controllers;

use App\Http\Csv;
use App\Models\Student;
use Bueltge\Marksimple\Marksimple;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExportSelected;

class ExportController extends Controller
{
    public function __construct()
    {
        // Only to test in the browser api auth
        Auth::loginUsingId(1);
    }

    public function welcome()
    {
        $ms = new Marksimple();

        return view('hello', [
            'content' =>  $ms->parseFile('../README.md'),
        ]);
    }

    /**
     * View all students found in the database
     */
    public function viewStudents()
    {
	    $students = Student::with('course')->get();

	    return view('view_students', compact('students'));
    }

	/**
	 * Exports selected students data to a CSV file
	 *
	 * @param \App\Http\Requests\ExportSelected $request
	 * @return \Illuminate\Http\Response|mixed
	 */
	public function export(ExportSelected $request)
	{
		$students = Student::with('course')->findOrFail($request->studentId)->all();

		return (new Csv($students, 'students'))->make();
	}

	/**
	 * Exports the total number of students that are taking each course to a CSV file
	 */
	public function exportCourseAttendenceToCSV()
	{
		//
	}

	/** Optional **/

    /**
     * View all students found in the database
     */
    public function viewStudentsWithVue()
    {
        $students = Student::with('courses')->get();

        return view('view_students_vue', compact(['students']));
    }

    /**
     * Exports all student data to a CSV file
     */
    public function exportStudentsToCsvWithVue()
    {
        //
    }

    /**
     * Exports the total amount of students that are taking each course to a CSV file
     */
    public function exportCourseAttendenceToCsvWithVue()
    {
        //
    }
}
