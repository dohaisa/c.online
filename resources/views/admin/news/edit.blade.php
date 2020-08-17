
@extends('layouts.admin')
@section('content')
<h1>Edit New</h1>

<form action="/admin/news/{{$new->id}}" method="post" enctype="multipart/form-data">
    <!-- CSRF Token -->
    @method('put')
    @csrf
    <div class="form-group">
        <label for="address">address</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address', $new->address+) }}">
        @error('address')
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
        <label for="news">New</label>
        <input type="textarea" class="form-control @error('news') is-invalid @enderror" name="news" id="news" value="{{ old('news', $new->news) }}">
        @error('news')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    </form>


@endsection
