
@extends('layouts.admin')
@section('content')
<h1>Create New</h1>

<form action="/admin/news" method="post" enctype="multipart/form-data">
    <!-- CSRF Token -->
    @csrf
    <div class="form-group">
        <label for="address">address</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}">
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
            <textarea class="textarea" id="news" name="news"> </textarea>
       <script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js">
            </script>
            <script>
            CKEDITOR.replace( 'news' );
            CKEditor.replace('news', { removePlugins : 'elementspath' });
            </script> 
            <!-- <script>
                $(function(){
$(".textarea").wysihtml5();
                });
            </script> -->
          <!-- </div> --> 


    <!-- <div class="form-group">
        <label for="news">New</label>
        <input type="textarea" class="form-control @error('news') is-invalid @enderror" name="news" id="news" value="{{ old('news') }}">
        @error('news')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div> -->

    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection
