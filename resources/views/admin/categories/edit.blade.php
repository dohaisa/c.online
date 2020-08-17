@extends('layouts.admin')

@section('content')
<div class="container">
<h1>Edit Category</h1>

<form action="/admin/categories/{{$category->id}}" method="post">
    <!-- CSRF Token -->
    @csrf
    @method('put')


    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $category->name) }}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="parent_id">Parent</label>
        <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
            <option value="">No Parent</option>
            @foreach (App\Category::all() as $cat)

            <option @if($cat->id == $category->parent_id) selected @endif value="{{ $cat->id }}">{{ $cat->name }}</option>

            @endforeach
        </select>
        @error('parent_id')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>



        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
</div>
@endsection
