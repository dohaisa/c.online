<?php

namespace App\Http\Controllers;
use App\Course;
use App\Category;
use Illuminate\Http\Request;

class FrontCourseController extends Controller
{
    public function index()
    {

        $courses = Course::all();
$categories=Category::all();
        return View('edu.courses', [
            'courses' => $courses,
            'categories'=>$categories,
        ]);

    }
    public function show($id)
    {

        $course = Course::findOrFail($id);
$categories=Category::all();
        return View('edu.coursesingle', [
            'course' => $course,
            'categories'=>$categories,
        ]);

    }

   

}
