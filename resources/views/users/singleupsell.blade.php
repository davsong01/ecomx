@extends('layouts.dashboard')
@section('slider')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>{{ $upsell->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
@endsection
@section('inactive', 'Home')
@section('active', $upsell->name)
@section('main')
     <!--================Blog Area =================-->
     <section class="blog_area single-post-area section-padding" style="padding-top: 20px;">
        <div class="container">
           <div class="row">
                <div class="col-lg-12 posts-list" style="max-width: 70%;
              margin: auto;">
                        <div class="row">
                            <div class="single-post">
                            <div class="blog_details">
                            <h2>{{ $upsell->name }}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#">&#8358;{{ $upsell->price }}</a></li>
                            </ul>
                            
                            </div>
                        </div>
                    </div>
                    <div class="single-post">
                        <h5>Image(s)</h5>
                        @if(isset($upsell->f_images) && $upsell->f_images != 'null')
                        <div class="row">                           
                            <div class="col-12" style="display: flex;">
                                @foreach(json_decode($upsell->f_images) as $image)
                                <div class="col-md-3 col-3" style="text-align: left;">
                                    <div class="feature-img" >
                                        <img style="width: 100%;" class="img-fluid" src="{{route('get.upsellfile', $image) }}" alt="{!! $image !!}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                              
                        </div>
                        @endif
                        @if(isset($upsell->video_link) && $upsell->video_link != 'null')
                        <h5 style="display: flex;margin-top:20px">Video Resource</h5>
                        <div class="row"> 
                                                      
                            <div class="col-12" style="display: flex;margin-top:10px">
                                   {!! $upsell->video_link !!}
                            </div>
                              
                        </div>
                        @endif
                    </div>
                    
                </div>
                
            </div>

        </div>
     </section>
 @endsection