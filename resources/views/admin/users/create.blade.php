@extends('layouts.admin')
@section('content')
<h1>Create User</h1>

<form action="/admin/users" method="post" >
    <!-- CSRF Token -->
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
       

 <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="">
        @error('email')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">PassWord</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="">
        @error('password')
        <p class="text-danger">{{ $message }}</p>
        @enderror
 </div> 

    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection
