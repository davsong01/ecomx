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
            <div class="col-12">
                <!-- Section Tittle -->
                <div class="section-tittle text-center">
                    <span>Choose plan</span>
                    <p>You have selected the plan with the information below, click proceed to make payment for this plan or back to select another plan</p>
                    @include('inc.alerts')
                </div>
                
            </div>
          </div>
          <div class="row">
            <div class="col-12 section-tittle text-center">
                <h5 style="color:#06a4ad">Plan Name</h5>
                {{ $plan->title }}
                <h5 style="color:#06a4ad">Plan Validity</h5>
                {{ $plan->validity }} month(s)
                <h5 style="color:#06a4ad">Plan Price</h5>
                &#8358;{{ $plan->amount }}</h5>
            </div>
          </div> 
          <form method="POST" action="{{ route('pay') }}">
                <input type="hidden" name="orderID" value="{{ $plan->id }}">
                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                <input type="hidden" name="amount" id="amount" value="{{ $plan->amount * 100}}">
                {{-- required in kobo --}}
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="currency" value="NGN">
                <input type="hidden" name="metadata"
                    value="{{ json_encode($array = ['plan_id' => $plan->id, 'validity'=> $plan->validity, 'type' => $plan->type ]) }}">
                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> 
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="card-body text-center"> 
                  <br>
                  <button class="btn btn-outline-primary btn-lg" style="border-radius:30px; width:100%">Proceed to payment</button>
                  <br>
                </div>
                
              </div> 
          </form>
          <div class="card-body text-center"> 
            <a style="color:red" href="{{ route('selectplans') }}">Take me back, I want to choose another plan</a>
          </div>
      </body>
            
     </section>
 @endsection