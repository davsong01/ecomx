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
@section('active', 'Plan Information')
@section('main')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12 col-sm-12" style="margin: 0 auto; padding: 10px 10%;">             
                <h4 style="display:inline-block">Subscribed Plan details <a href="{{ route('plan.upgrade', auth()->user()->plan->id) }}" class="btn btn-primary" style="display:inline-block; margin: 0 auto;border-radius: 20px;padding: 20px 15px;font-size: 12px;text-transform: none;">Upgrade Plan</a></h4>
                @include('inc.alerts')
                <fieldset class="form-group">
                    <label for="">Plan name </label>
                    <input type="text" class="form-control" value="{{ auth()->user()->plan->title }}" disabled>
                </fieldset>
                <fieldset class="form-group">
                    <label for="">Subscription Date </label>
                    <input type="text" class="form-control" value="{{ auth()->user()->plan_start }}" disabled>
                </fieldset>
                <fieldset class="form-group">
                    <label for="name">Expiry date</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->plan_expiry }}" disabled>
                </fieldset>  
                <a href="{{ route('dashboard') }}" class="btn btn-primary" style="width:100%;margin: 0 auto;" type="submit">Visit Dashboard</a>
            </div>
        </div>
    </section>
    <!-- Basic Inputs end -->          
</div>
@endsection