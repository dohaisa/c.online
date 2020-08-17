@extends('layouts.admin')
@section('content')
<h1>Edit Course</h1>

<form action="/admin/courses/{{$course->id}}" method="post" enctype="multipart/form-data">
    @method('put')
    <!-- CSRF Token -->
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $course->name) }}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
            <option value="">Select Category</option>
            @foreach (App\Category::all() as $category)

            <option @if($category->id == old('category_id')) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>

            @endforeach
        </select>
        @error('category_id')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">description</label>
        <input type="textarea" class="form-control @error('description') is-invalid @enderror" name="description" id="description"  value="{{ old('description', $course->description)}}">
        @error('description')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="vedio">Vedio</label>
        <input type="file" class="form-control @error('vedio') is-invalid @enderror" name="vedio []" id="vedio">
        @error('vedio')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection
