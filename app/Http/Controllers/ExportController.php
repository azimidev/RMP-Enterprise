<?php

namespace App\Http\Controllers;

use App\Http\Csv;
use App\Models\Course;
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

		// I created a class called Csv to generate a csv file and download it
		// this class gets all the data as a first parameter
		// the second parameter is the name of the file
		// and then automatically get the attributes of the model
		// and exports (downloads the file)
		return (new Csv($students, 'students'))->make();
	}

	/**
	 * Exports the total number of students that are taking each course to a CSV file
	 */
	public function exportCourseAttendenceToCSV()
	{
		$courses = Course::withCount('students')->get();

		// It wasn't mentioned where should I use this function
		// but according to your comment above you want
		// number of students for all course

		// this will export all courses and their fields.
		// The last number after timestamps in csv file is
		// number of students for each course
		return (new Csv($courses, 'courses'))->make();
	}

	/** Optional **/

    /**
     * View all students found in the database
     */
    public function viewStudentsWithVue()
    {
        $students = Student::with('courses')->get();

        return view('view_students_vue', compact('students'));
    }

    /**
     * Exports all student data to a CSV file
     */
    public function exportStudentsToCsvWithVue()
    {
	    $students = Student::with('course')->findOrFail(request('students'))->all();

	    return (new Csv($students, 'students'))->make();
    }

    /**
     * Exports the total amount of students that are taking each course to a CSV file
     */
    public function exportCourseAttendenceToCsvWithVue()
    {
	    $courses = Course::withCount('students')->get();

	    // According to your comment above you want
	    // number of students for all course

	    // this will export all courses and their fields
	    // the last number after timestamps in csv file is
	    // number of students for each course
	    // assune the ones with no number is 0
	    return (new Csv($courses, 'courses'))->make();
    }
}
