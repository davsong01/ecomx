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
@section('active', 'Checkout')
@section('main')
     <!--================Blog Area =================-->
     <section class="blog_area single-post-area section-padding" style="padding-top: 20px;">
        <div class="container">
           <div class="row">
            <div class="col-lg-12">
              @include('inc.alerts')
                <!-- Section Tittle -->
                <div class="section-tittle text-center">
                    <span>Choose plan</span>
                    <p>You have selected the plan with the following information, click proceed to make payment for this plan or back to select another plan </p>
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
                            <span class="h2">&#8358;{{ $plan->mprice }}/month</span>

                          </div>
                        
                        <form method="POST" action="{{ route('pay') }}">
                        <input type="hidden" name="orderID" value="{{ $plan->id }}">
                        <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                        <input type="hidden" name="amount" id="amount" value="{{ $plan->price * 100}}">
                        {{-- required in kobo --}}
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="currency" value="NGN">
                        <input type="hidden" name="metadata"
                            value="{{ json_encode($array = ['plan_id' => $plan->id, 'type' => 1]) }}">
                            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       
                        <div class="card-body text-right">
                          <br>
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