<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('/admin/courses/index');
        // $courses= Course::join('categories', 'categories.id', '=', 'courses.category_id')
        // ->select([
        //     'courses.*',
        //     'categories.name as category_name'
        // ])
        // ->paginate(3);


           $courses = Course::with('category')->paginate(2);

    return View('admin.courses.index', [
        'courses' => $courses,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *036 @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'category_id' => 'required|int|exists:categories,id',
            'image' => 'image',
            // 'video' =>  'video',
        ]);

        $image_path = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $image_path = $image->store('courses', 'public');
        }


        $video_path = null;
        if ($request->hasFile('video') && $request->file('video')->isValid()) {
            $video = $request->file('video');
            $video_path = $video->store('courses', 'public');
        }

        // return dd($video);
        $data = $request->all();

        $data['image'] = $image_path;
        $data['video'] = $video_path;

        // return $data;
        $course = Course::create($data);



        return redirect('/admin/courses')
        ->with('alert-success',"Course \"{$course->name}\" Created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', [
            'course' => $course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $course = Course::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'category_id' => 'required|int|exists:categories,id',
            'image' => 'image',
            'vedio' => 'vedio',
        ]);

        $course->update($request->all());

        return redirect('/admin/courses')
        ->with('alert-success',"Course \"{$course->name}\" Updated!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect('/admin/courses')
        ->with('alert.success', "Course \"{$course->name}\" Deleted!");
        ;

    }
}
