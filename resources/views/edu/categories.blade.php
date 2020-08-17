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
                                <h2>All Categories</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!-- all-course Start -->
        <section class="all-course section-padding30">
            <div class="container">
                <div class="row">
                    <div class="all-course-wrapper">
                        <!-- Heading & Nav Button -->
                        <div class="row mb-15">
                            <div class="col-lg-12">
                                <div class="properties__button mb-90">
                                    <!--Nav Button  -->                                            
                                    <nav>                                                                             
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                            @foreach($categories as $category)
                                            <a class="nav-item nav-link active" id="nav-{{$category->name}}-tab"  href="{{route('categories.cources',$category->id)}}"  aria-controls="{{$category->name}}" aria-selected="false">{{$category->name}}</a>
                                       @endforeach
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <!-- Tab content -->
                        <div class="row">
                        
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!--  one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">       
                                        <div class="row">
                                        @foreach($cources as $cource)
                                            <div class="col-xl-4 col-lg-4 col-md-6">
                                                <!-- Single course -->
                                                <div class="single-course mb-70">
                                                    <div class="course-img">
                                                        <img src="{{asset('storage/'.$cource->image)}}" alt="">
                                                    </div>
                                                    <div class="course-caption">
                                                        <div class="course-cap-top">
                                                            <h4><a href="{{route('coursesingle',$cource->id)}}">{{$cource->name}}</a></h4>
                                                        </div>
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
                                                @endforeach
                                            </div>
                              
                               
                                        
                                         
                                           
                                           
                                            
                                                
</div>
                                        </div>
                                    </div>
                                </div>
                            <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- all-course End -->
    </main>
   
    @endsection