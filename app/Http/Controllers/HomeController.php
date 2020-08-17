<?php

namespace App\Http\Controllers;
use App\Course;
use App\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $latest_courses = Course::latest()->limit(5)->get();
       $latest_news = News::latest()->limit(2)->get();
        return view('home1',[

            'latest_courses' => $latest_courses,
            'latest_news' => $latest_news,
        ]);
    }




    // public function HomeCategory()
    // {
    //     $category = Category::all();

    //     return View('home', [
    //         'category' => $category,
    //     ]);


}
