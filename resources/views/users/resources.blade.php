@extends('layouts.dashboard')
@section('slider')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2 style="color: white;">All Resources</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
@endsection
@section('inactive', 'Home')
@section('active', 'Resources')
@section('main')
    
    <div class="listing-area pt-12 pb-12">
        <div class="container">
            <div class="row">
                @forelse($resources as $resource)
                <div class="col-md-12 col-sm-12">
                    <div class="">
                        <p>{{ $resource->title }}</p>
                        <div class="">
                            <p>{!! $resource->link !!}</p>
                        </div>
                    </div>
                    <hr style="color: #06a4ad; height: px; border: 1px solid;">
                </div>
                @empty
                <div class="col-md-12 col-sm-12">
                    <p>No resource currently available</p>
                </div>
                @endforelse

            </div>
        </div>
    </div>
   
    @endsection