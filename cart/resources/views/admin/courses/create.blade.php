
@extends('layouts.admin')
@section('content')
<h1>Create Course</h1>

<form action="/admin/courses" method="post" enctype="multipart/form-data">
    <!-- CSRF Token -->
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
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
        <textarea  style="width:100%; height:200px ; font-size:14px padding:10px; line-height:18px; solid:#ddddd" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" id="description"  value="{{ old('description') }}"></textarea>
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
        <label for="video">video</label>
        <input type="file" class="form-control @error('video') is-invalid @enderror" name="video" id="video">
        @error('video')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection
