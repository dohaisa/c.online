@extends('layouts.admin')

@section('title', 'Courses')

@section('content')

@if (session()->has('alert.success'))
<div class="alert alert-success">
  {{ session('alert.success') }}
</div>
@endif

<div class="d-flex">
  <h1 class="h3 mb-4 text-gray-800">Courses</h1>
  <div class="ml-auto">
    <a href="/admin/courses/create" class="btn btn-sm btn-outline-success">Create new</a>
  </div>

</div>
<div>
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Image</th>
      <th>Video</th>
      <th>Name</th>
      <th>Category</th>
      <!-- <th>Description</th> -->
      <th>Created At</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($courses as $course)
    <tr>

     <td>{{ $course->id }}</td>
     <td><img height="60" src="{{ asset('storage/photo' . $course->image) }}"></td>
     <td>{{$course->video}}</td>
     <td>{{ $course->name }}</td>
      <td>{{ $course->category->name }}</td>
      <!-- <td>{{ $course->description }}</td> -->
      <td>{{ $course->created_at }}</td>
      <td>
        <div class="d-flex">
        <a class="btn btn-outline-primary btn-sm mr-1" href="/admin/courses/{{$course->id}}/edit">Edit</a>
          <form method="post" action="/admin/courses/{{$course->id }}">
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

</div>
{{ $courses->links() }}

@endsection
