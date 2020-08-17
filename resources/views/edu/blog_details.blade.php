

@extends('layouts.front')
@section('content')




<main>
      <!--? Hero Start -->
      <div class="slider-area ">
         <div class="slider-height2 d-flex align-items-center">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-12">
                           <div class="hero-cap hero-cap2 text-center">
                              <h2>Blog Details</h2>
                           </div>
                     </div>
                  </div>
               </div>
         </div>
      </div>
      <!-- Hero End -->
      <!--================Blog Area =================-->
      <section class="blog_area single-post-area section-padding">
         <div class="container">
            <div class="row">
               @foreach($blog as $new)
               <div class="col-lg-8 posts-list">
                  <div class="single-post">
                     <div class="feature-img">
                        <img class="img-fluid" src="{{asset('storage/'.$new->image)}}" alt="">
                     </div>
                     <div class="blog_details">
                        <h2 style="color: #2d2d2d;">{{ $new->address }}
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                           <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                           <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                        </ul>
                      
                       <p>  {!! htmlspecialchars_decode($new->news) !!}</p>
                     </div>
                  </div>
              
            
     @endforeach
                  
               </div>
            </div>
         </div>
      </section>
      <!--================ Blog Area end =================-->
   </main>

   @endsection