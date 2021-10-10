@extends('layouts.app')
@section('slider')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>About {{ config('app.name') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
@endsection
@section('main')
    <!--Hero End -->
    <!-- ================ contact section start ================= -->
    <section class="contact-section" style="margin-top:30px">
        <div class="container">
            
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Terms and Conditions</h2>
                    @include('inc.alerts')
                </div>
                <div class="col-12">
                   <p class="normalize">
                   
                   </p>
                </div>
                
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
