@extends('layouts.dashboard')
@section('slider')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
@endsection
@section('inactive', 'Home')
@section('active', 'Select Plan')
@section('main')
     <!--================Blog Area =================-->
     <section class="blog_area single-post-area section-padding" style="padding-top: 20px;">
        <div class="container">
           <div class="row">
            <div class="col-lg-12">
                <!-- Section Tittle -->
                <div class="section-tittle text-center">
                    <span>Choose plan</span>
                    <p>Hello {{ auth()->user()->username }}, thank you for registering, now you need to subsribe to a preferred plan to gain access to product details</p>
                    @include('inc.alerts')
                </div>
            </div>

            <div class="container-fluid" style="background: linear-gradient(90deg, #00C9FF 0%, #92FE9D 100%);">
                <div class="container p-5">
                  <div class="row">
                    @foreach($plans as $plan)
                    
                      <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card h-100 shadow-lg">
                          <div class="card-body">
                            <div class="text-center p-3">
                              <h5 class="card-title">{{ $plan->title }}</h5>
                              <span class="h2">&#8358;{{ number_format($plan->mprice, 2) }}/mo</span>
                            </div>
                            
                          </div>
                          <ul class="list-group list-group-flush">
                            @foreach(json_decode($plan->features) as $feature)
                            <li class="list-group-item"> <i class="fa fa-check"></i> {{ $feature }}</li>
                            @endforeach
                            <form method="POST" action="{{ route('checkout') }}">
                              @csrf
                              <select class="form-control" style="border-radius:0px !important; float: none; !important" name="price" id="price" required>
                                <option value="" selected>Choose Validity period</option>
                                <option value="{{ $plan->mprice}}">&#8358;{{ number_format($plan->mprice, 2) }}/ mo</option>
                                <option value="{{ $plan->threemprice}}">&#8358;{{ number_format($plan->threemprice, 2)}}/3 mo ({{ $plan->threempercentoff }}% off)</option>
                                <option value="{{ $plan->sixmprice}}">&#8358;{{ number_format($plan->sixmprice, 2)  }}/6 mo ({{ $plan->sixmpercentoff }}% off)</option>
                                <option value="{{ $plan->twelvemprice}}">&#8358;{{ number_format($plan->twelvemprice, 2)}}/12 mo ({{ $plan->twelvempercentoff }}% off)</option>
                              </select>
                            
                            </li>
                            
                          </ul>
                          
                          <div class="card-body text-right">
                            <br>
                            <input type="hidden" name="plan" value="{{ $plan->id }}">
                            <input type="hidden" name="type" value="1">
                            <button class="btn btn-outline-primary btn-lg" style="border-radius:30px">Select</button>
                            <br>
                          </div>
                        </form>
                        </div>
                      </div>
                    
                    @endforeach
                  </div>    
                </div>
              </body>
            
             
        </div>
     </section>
 @endsection