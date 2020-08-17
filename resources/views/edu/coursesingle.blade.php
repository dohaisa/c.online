@extends('layouts.front')
@section('content')




<div class="container">
      <div class="row" style="padding :60px">
     
        <div class="col-lg-4">
          <div class="card" style="width: 19rem;">
            <div class="embed-responsive embed-responsive-1by1">
              <iframe class="embed-responsive-item" src="{{asset('storage/'.$course->video)}}"></iframe>
            </div>
            <div class="card-body">
            
              <h5 class="card-title">
              {!! htmlspecialchars_decode($course->description) !!}</h5>
             
              </div>
            </div>
         
       
        </div>
      </div>
    </div>
  </div> 




@endsection