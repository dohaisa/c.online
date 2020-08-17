@extends('layouts.admin')

@section('content')
<div class="container">
<h1>Create Category</h1>
 <form action="/admin/categories" method="POST">
  @csrf

  <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" >

    @error('name')
    <p class="text-danger">{{ $message }}</p>
    @enderror

  </div>


  <!-- <div class="form-group">
    <label for="icon">Icon</label>
    <input type="icon" class="form-control @error('icon') is-invalid @enderror" name="icon" id="icon" >

    @error('icon')
    <p class="text-danger">{{ $message }}</p>
    @enderror

  </div> -->

  <div class="form-group">
    <label for="parent_id">Parent</label>
    <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
        <option value="">No Parent</option>
        @foreach (App\Category::all() as $category)

        <option @if($category->id == old('parent_id')) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>

        @endforeach
    </select>

    @error('name')
    <p class="text-danger">{{ $message }}</p>
    @enderror

  </div>
    <button type="submit" class="btn btn-primary">Add</button>
 </form>
</div>

@endsection
