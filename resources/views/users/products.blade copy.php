@extends('layouts.dashboard')
@section('slider')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Products Listing</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
@endsection
@section('inactive', 'Home')
@section('active', 'Products')
@section('main')
    <!--Hero End -->
    <!-- ================ contact section start ================= -->
   

    <!-- listing Area Start -->
    <div class="listing-area pt-12 pb-12">
        <div class="container">
            <div class="row">
                <!-- Left content -->
               @include('inc.filter')
                <!-- Right content -->
                <div class="col-xl-9 col-lg-9 col-md-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="count mb-35">
                                <span>{{ $products->count() }} product(s) available</span>
                            </div>
                        </div>
                    </div>
                    <!-- listing Details Stat-->
                    <div class="listing-details-area">
                        <div class="container">
                            <div class="row">
                                @foreach($products as $product)
                                @if($product->category)
                                <div class="col-md-4 sm-12">
                                    <a href="{{ route('product.single', $product->slug) }}">
                                    <div class="single-listing mb-30">
                                        
                                        <div class="list-img">
                                            <img style="width:100% !important; max-height:250px" src="{{ route('get.file', $product->main_image) }}" alt="product_image">
                                        </div>
                                        
                           
                                        <div class="list-caption">
                                            <span>&#8358;{{ $product->price}}</span>
                                             <h6>{{ $product->title }}</h6>
                                           <p>{{ $product->description }}</p>
                                            <div class="list-footer">
                                                <ul>
                                                    <li class="view-more">View creatives</li> 
                                                </ul>
                                            </div>
                                        </div>
                                   
                                    </div>
                                </a> 
                                @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- listing Details End -->
                    <!--Pagination Start  -->
                    <div class="pagination-area pt-70 text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 mb-10" >
                                    <div class="single-wrap d-flex justify-content-center">
                                        {{ $products->links() }}
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Pagination End  -->
                </div>
            </div>
        </div>
    </div>
    <!-- listing-area Area End -->
    @endsection