@extends('layouts.admin')

@section('title', 'News')

@section('content')

@if (session()->has('alert.success'))
<div class="alert alert-success">
  {{ session('alert.success') }}
</div>
@endif

<div class="d-flex">
  <h1 class="h3 mb-4 text-gray-800">News</h1>
  <div class="ml-auto">
    <a href="/admin/news/create" class="btn btn-sm btn-outline-primary">Create new</a>
  </div>

</div>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>address</th>
      <th>Image</th>
      <th>News</th>
      <th>Created At</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($news as $new)
    <tr>

     <td>{{ $new->id }}</td>
     <td>{{ $new->address }}</td>
     <td><img height="60" src="{{ asset('storage/' . $new->image) }}"></td>
     <td>{{ $new->news }}</td>
     <td>{{ $new->created_at }}</td>
      <td>
        <div class="d-flex">
        <a class="btn btn-outline-success btn-sm mr-1" href="/admin/news/{{$new->id}}/edit">Edit</a>
          <form method="post" action="/admin/news/{{$new->id }}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm mr-1">Delete</button>
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{-- {{ $news->links() }} --}}

@endsection
