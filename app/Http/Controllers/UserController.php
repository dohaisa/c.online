<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return View('/admin.users.index', [
            'users' => $users,
        ]);
    }


    public function create()
    {
        return View('admin.users.create');
    }


    public function show($id)
    {
        $users = User::findorFile($id);
        return $users;
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255|min:3',
           
        ]);

        $data = $request->all();
        $user = User::create($data);



        return redirect('/admin/users')
        ->with('alert-success',"User \"{$user->name}\" Created!");
    }



    public function edit($id)
    {
        //
        $profile = Profile::findOrFail($id);
        return $profile->load('user');
    }

  
}
