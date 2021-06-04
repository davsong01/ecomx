@extends('layouts.dashboard')
@section('slider')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Request for withdrawal</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
@endsection
@section('title', 'Request withdrawal')
@section('inactive', 'Home')
@section('active', 'Request  withdrawal')
@section('main')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row" style="margin: 0 auto;">
            <div class="col-12">
                <div class="card">
                   
                    <div class="card-content">
                        <div class="card-body">
                            <div class="col-12">
                        
                                @include('inc.alerts')
                                <form action="{{ route('withdrawals.submit') }}" method="POST">
                                @csrf
                                <div class="col-md-12 col-sm-12">
                                    <div class="section-tittle text-center">
                                        <span>Create withdrawal</span>
                                    </div>
                                    <div class="single-services text-center">
                                        <p>Congratulations, with a referral bonus of &#8358;{{ auth()->user()->referral_bonus }}, you are eligible to create request for withdrawal of this fund. Please fill the form below and we will credit your account soon <small><br> NOTE: Please fill in your bank details on your <a href="{{ route('update_profile', auth()->user()->id) }}">profile settings</a></small></p>
                                        
                                    </div>
                                   
                                    <fieldset class="form-group">
                                        <label>Referral bonus(&#8358;)</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->referral_bonus }}" disabled>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="amount">Amount to withdrawal</label>
                                        <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" placeholder="{{ auth()->user()->referral_bonus }}" max="{{ auth()->user()->referral_bonus }}" required>
                                    </fieldset>
    
                                    <button class="btn btn-primary" style="width:100%" type="submit">Submit</button>
                                    
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Inputs end -->          
</div>
@endsection