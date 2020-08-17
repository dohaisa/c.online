@extends('layouts.front')
@section('content')




<div class="container">
      <div class="row" style="padding :60px">
          @foreach($courses as  $course)
        <div class="col-lg-4">
          <div class="card" style="width: 19rem;">
            <div class="embed-responsive embed-responsive-1by1">
              <iframe class="embed-responsive-item" src="{{asset('storage/'.$course->video)}}"></iframe>
            </div>
            <div class="card-body">
            
              <h5 class="card-title">{{$course->description}}</h5>
              <div class="course-cap-mid d-flex justify-content-between">
                                    <div class="course-ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <ul><li>52 Review</li></ul>
                                </div>
                                <div class="course-cap-bottom d-flex justify-content-between">
                                    <ul>
                                        <li><i class="ti-user"></i> 562</li>
                                        <li><i class="ti-heart"></i> 562</li>
                                    </ul>
                                    <span>Free</span>
              </div>
            </div>
         
       
        </div>
      </div>
      @endforeach
    </div>
  </div> 




@endsection