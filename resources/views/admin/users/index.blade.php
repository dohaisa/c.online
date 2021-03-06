@extends('layouts.admin')

@section('title', 'Users')

@section('content')


<div class="d-flex">
  <h1 class="h3 mb-4 text-gray-800">Users</h1>
  <div class="ml-auto">
    <a href="/admin/users/create" class="btn btn-sm btn-outline-success">Create new</a>
  </div>
  
</div>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Password</th>
      <th>Created At</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->password }}</td>
      <td>{{ $user->created_at }}</td>
      <td>
        <div class="d-flex">
          <a class="btn btn-outline-primary btn-sm mr-1" href="/admin/users/{{$user->id}}/edit">Edit</a>
          <form method="post" action="admin/users/{{$user->id}}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm delete">Delete</button>
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>



@endsection