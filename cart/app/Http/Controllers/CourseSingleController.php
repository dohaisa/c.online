<?php

namespace App\Http\Controllers;
use App\Course;
use Illuminate\Http\Request;

class CourseSingleController extends Controller
{
    public function index()
    {

        $courses = Course::all();

        return View('edu.coursesingle', [
            'courses' => $courses,
        ]);

    }
}
