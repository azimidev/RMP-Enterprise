<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\University;
use Illuminate\Http\Request;
use Bueltge\Marksimple\Marksimple;
use Illuminate\Support\Facades\Auth;

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
        $students = Student::with('courses.university')->get();

        return view('view_students', compact(['students']));
    }

    /**
     * Exports selected student data to a CSV file
     */
    public function exportStudentsToCSV()
    {
        //
    }

    /**
     * Exports the total number of students that are taking each course to a CSV file
     */
    public function exportCourseAttendenceToCSV()
    {
        //
    }
}
