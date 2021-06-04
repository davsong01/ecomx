@extends('layouts.dashboard')
@section('slider')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h4 style="color: white;">{{ $category->title }}</h4>
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
                                @if($category->title)
                                <h5 style="padding: 5px;
                                background: #f8971f;">{{ $category->title }}</h5>
                                @endif
                                <span>{{ $products->count() }} product(s) available </span><a href="#" data-toggle="modal" data-target="#myModal" class="btn view-btn1">Suggest Product</a>
                                @include('inc.alerts')
                            </div>
                        </div>
                    </div>
                    
                    <!-- listing Details Stat-->
                    <div class="listing-details-area">
                        <div class="container">
                            <div class="row">
                                @foreach($products as $product)
                                <div class="col-md-3 col-sm-4">
                                    <div class="product-grid">
                                        <div class="product-image">
                                            
                                            @if($product->stock < 1)
                                            <img src="{{ route('get.file', $product->main_image) }}" alt="product_image">
                                            @else
                                            <a  href="{{ route('product.single', $product->slug) }}" class="image"> 
                                                <img src="{{ route('get.file', $product->main_image) }}" alt="product_image">
                                            </a>
                                            @endif
                                               
                                            @if($product->stock < 1)
                                            <span class="product-hot-label">Sold out</span>
                                            @endif
                                            @if($product->stock < 1)
                                            <ul class="product-links">
                                                <li><a href="#" data-tip="Sold out"></i> Sold Out</a></li>
                                               
                                            </ul>
                                            @else
                                            <ul class="product-links">
                                                <li><a href="{{ route('product.single', $product->slug) }}" data-tip="View creatives"><i class="fa fa-arrow-right"></i> View Creatives</a></li>
                                               
                                            </ul>
                                            @endif
                                            
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title"><a href="{{ route('product.single', $product->slug) }}">{{ $product->title }}</a></h3>
                                            <div class="price">&#8358;{{ number_format($product->price, 2)}}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                              
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- listing-area Area End -->
    {{-- Suggest Product suggest modal --}}
    ​ <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Suggest Product</h2>
                        <form class="form-contact contact_form" action="{{ route('suggestion.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Product Name</label>
                                        <input class="form-control valid" name="name" value="{{ old('name') }}" id="name" type="text" placeholder="Enter product name" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Product Image (Not more than 1mb | jpg,jpeg,png accepted)</label>
                                        <input class="form-control valid" name="file" id="file" type="file" value="{{ old('file') }}" required accept="image/*>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Create Suggestion</button>
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
           
          </div>
        
        </div>
    </div>
    {{-- End of Product suggest modal --}}
    @endsection