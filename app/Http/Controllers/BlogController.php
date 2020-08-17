<?php

namespace App\Http\Controllers;
Use App\News;
use Illuminate\Http\Request;

class BlogController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();

        return View('edu.blog', [
            'news' => $news,
        ]);

}

public function show($id)
{
    
    $blog = News::findOrFail($id)->all();
    // $news = News::all();
    
    return View('edu/blog_details', [
        'blog' => $blog,
        // 'news' => $news,
    ]);

}}