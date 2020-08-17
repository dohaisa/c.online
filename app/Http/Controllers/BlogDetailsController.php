<?php

namespace App\Http\Controllers;
Use App\News;
use Illuminate\Http\Request;

class BlogDetailsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return View('edu.blog_details', [
            'news' => $news,
        ]);
}
}