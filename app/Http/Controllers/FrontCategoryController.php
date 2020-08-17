<?php

namespace App\Http\Controllers;
use App\Category;
use App\Course;
use Illuminate\Http\Request;

class FrontCategoryController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $cources= Course::all();

        return View('edu.categories', [
            'categories' => $categories,
            'cources' => $cources,
        ]);

    }
    public function show($id)
    {

        $category = Category::findOrFail($id);
        $categories = Category::all();
        $cources=Course::where('category_id',$id)->get();



        return View('edu.categories', [
            'categories' => $categories,
            'cources' => $cources,
        ]);

    }


}
