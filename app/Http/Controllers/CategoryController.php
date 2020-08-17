<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     * 
     *  */
    
    //  public function __construct()
    // {
    //     $this->middleware('auth')->except('index');
    // }
    
    public function index()
    {
        $categories = Category::all(); //collection عبارة عن لوب او مصفوفة
         $categories = Category::leftJoin('categories as parents', 'parents.id', '=', 'categories.parent_id')
            ->select([
                'categories.*',
                'parents.name as parent_name',

            ])
            ->paginate(2);

        // $categories = Category::with('parent')->paginate(2);
            return view('admin.categories.index', [
                'entries' => $categories,
            ]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkRequest($request);

        $category = Category::create([
            'name' => $request->name,
            'parent_id' => $request->input('parent_id'),
            'image' => 'image',
             // Recommended
        ]);

        $image_path = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $image_path = $image->store('photo', 'public');
        }

 
        $data = $request->all();
        $data['image'] = $image_path;
        return redirect('/admin/categories')
        ->with('alert-success',"Category \"{$category->name}\" Created!");
            // ->route('admin.categories.index');
        // $this->checkRequest($request);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //   $this->checkRequest($request);
        // $validator = Category::getValidator($request->all(), $id);
        // //$validator->validate();
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect('/admin/categories')
        ->with('alert.success', "Category \"{$category->name}\" Updated!");
        ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/admin/categories')
        ->with('alert.success', "Category \"{$category->name}\" Deleted!");


    }

    public function courses(Category $category)
    {
        $courses=$category->courses;
        return view('/edu/courses')->with('courses', $courses);
           
    }

    protected function checkRequest(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'min:3',
                'unique:categories,name,' ,
            ],
            'parent_id' => [
                'nullable',
                'int',
                'exists:categories,id'
            ],

        ]);
    }




}
