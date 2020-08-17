<?php

namespace App\Http\Controllers;
 use App\Course;
use Illuminate\Http\Request;

class FrontCourseController extends Controller
{
    public function index()
    {

        $courses = Course::all();

        return View('edu.courses', [
            'courses' => $courses,
        ]);

    }

   

}
