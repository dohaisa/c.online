@extends('layouts.admin')
@section('title','categorise')
@section('content')

<div class="container">

    @if (session()->has('alert.success'))
<div class="alert alert-success">
  {{ session('alert.success') }}
</div>
  @endif


  <div class="d-flex">
    <h1 class="text-secondary"   >Categories</h1>
    <div class="ml-auto">
      <a href="/admin/categories/create" class="btn btn-sm btn-outline-primary">Create new</a>
    </div>

  </div>
{{--
<h1 class="h3 mb-4 text-gray-800">categories</h1>
<div class="ml-auto">
<a href="/admin/categories/create " class="btn btn-outline-dark delete" > Creat New </a>
</div> --}}

<table class="table table-striped table-Info ">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <!-- <th>Icon</th> -->
            <th>Name</th>
            <th>Parent</th>
            <th>Create At</th>
            <th>Status</th>

        </tr>
    </thead>
    <tbody>
        @foreach($entries as $category)
        <tr>
            <td>{{$category->id }} </td>
            <td><img height="60" src="{{ asset('storage/' . $category->image) }}"></td>
            <!-- <td>{{$category->icon }} </td> -->
            <td>{{ $category->name}}</td>
            <td> {{$category->parent_name}}  </td>
            <td> {{$category->created_at}}  </td>

            <td>
                <div class="d-flex">
                <a href="/admin/categories/{{$category->id}}/edit " class="btn btn-outline-success btn-sm mr-1"> Edit  </a>

                 <form action="/admin/categories/{{$category->id}}" method="post">
                 @method('delete')
                 @CSRF
                 <button type="submit"class="btn btn-outline-danger btn-sm mr-1" > Delete </button>
                 </form>
                </div>
             </td>
        </tr>
         @endforeach
    </tbody>
</table>

{{ $entries->links() }}

@endsection
