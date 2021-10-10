@extends('layouts.dashboard')
@section('extra-css')
<style>
.photo-gallery {
    color:#313437;
    background-color:#fff;
  }
  
  .photo-gallery p {
    color:#7d8285;
  }
  
  .photo-gallery h2 {
    font-weight:bold;
    margin-bottom:40px;
    padding-top:40px;
    color:inherit;
  }
  
  @media (max-width:767px) {
    .photo-gallery h2 {
      margin-bottom:25px;
      padding-top:25px;
      font-size:24px;
    }
  }
  
  .photo-gallery .intro {
    font-size:16px;
    max-width:500px;
    margin:0 auto 40px;
  }
  
  .photo-gallery .intro p {
    margin-bottom:0;
  }
  
  .photo-gallery .photos {
    padding-bottom:20px;
  }
  
  .photo-gallery .item {
    padding-bottom:30px;
  }
</style>
  
@endsection
@section('slider')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h4 style="color: white; margin-top: 50px;">{{ $product->title }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
@endsection
@section('inactive', 'Home')
@section('active', $product->title)
@section('main')
<div class="listing-area pb-12">
    <div class="container mb-20">
        <div class="row">
            <!-- Right content --> 
            <div class="col-12">
                <h2 class="contact-title">{{ $product->title }}</h2>
                @include('inc.alerts')
                <ul class="blog-info-link mt-3 mb-4">
                    @if(isset($product->category)  &&  count($product->category) > 0)
                    <li>
                        <a href="#"><i class="fa fa-list-alt"></i>
                        @foreach($product->category as $category)
                        <a href="{{ route('category.filter', $category->slug) }}">{{ $category->title }} </a>
                        @endforeach
                        </a>
                    </li>
                    @endif
                    <li><a href="#"><i class="fa fa-money"></i> &#8358;{{ $product->price }}</a></li>
                </ul>
            </div>
            
        </div>
        <div class="row">
            <!-- Right content -->
            <div class="col-12">
                <h5>Product images</h5>
            </div>
        </div>
        <div class="row">
            <div class="photo-gallery">
                <div class="container">
                    <div class="row photos">
                        @foreach(json_decode($product->f_image) as $image)
                        @if(count(json_decode($product->f_image))  < 2 )
                         <div class="col-sm-6 col-md-12 col-lg-12 item"><a href="{{route('get.file', $image) }}" data-lightbox="photos"><img class="img-fluid" src="{{route('get.file', $image) }}"></a></div>
                        @else
                        <div class="col-sm-6 col-md-12 col-lg-4 item"><a href="{{route('get.file', $image) }}" data-lightbox="photos"><img class="img-fluid" src="{{route('get.file', $image) }}"></a></div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
        </div>
        
        @if(isset($product->videos) && $product->videos != 'null')
        <div class="row">
            <!-- Right content -->
            <div class="col-12">
                <h5>Video Resource</h5>
            </div>

            <div class="col-12" style="display: flex;margin-top:10px">
                {!! $product->videos !!}
             </div>
        </div>
        @endif
        <div class="row">
            <!-- Right content -->
            <div class="col-12 mt-10">
                <h5>Product Description</h5>
            </div>
            <div class="col-12 product mt-10">
                {!! $product->description !!}
            </div>  
        </div>

        <div class="row">
            @if($isProductHasSalesPage > 0)
                <button class="accordion">Salespage </button>
               
                <div class="panel ck-content">
                    @if(auth()->user()->plan->viewCreatives == 1)
                        <p class="details">
                            <div class="count mb-10">
                                    @if(!is_null($requestedForCurrentProduct) && $requestedForCurrentProduct->status == 0)
                                        <div class="col-12">
                                            <p class="view-btn1" style="padding: 20px;
                                            text-align: center;background: #06a4ad; color: white;" disabed>Product's salespage requested, awaiting approval</p>
                                        </div>
                                    @endif
                                    @if(!is_null($requestedForCurrentProduct) && $requestedForCurrentProduct->status == 1)
                                        SalesPage demo: <a class="btn view-btn1" style="background: #06a4ad; color: white;" href="{{ route('downloadsalespagefile', $salespage_file) }}"> <i class="fa fa-download"></i> Download file</a><br><br>
                                    @endif
                              
                            </div> 
                            Watch how to Create your own Salespage below 
                            
                        </p>
                        <div class="col-12" style="margin-top:10px;">
                            {!! \App\Settings::select('salespage_howto')->value('salespage_howto') !!}
                        </div>  
                    @else
                        <p class="details" style="width: 100%;"><h5 style="color:red">Sorry!!!</h5> You cannot view Salespage link nor download the salespage demo except you upgrade your plan! <br><br>
                            <a style="background: #06a4ad !important;
                            border-radius: 30px;
                            padding: 10px 20px !important;
                            color:white;
                            margin: 0 11px;" href="{{ route('plan.upgrade', auth()->user()->plan->id) }}"><strong>Upgrade plan now</a> 
                        </p>
                    @endif
                </div>
            @endif

            <button class="accordion">Facebook Ads creative </button>
            <div class="panel">
                @if(auth()->user()->plan->viewCreatives == 1)
                <p class="details">
                    {!! $product->creatives !!}
                    Watch how to Create your own Facebook Ads creative below 
                    <div class="col-12" style="margin-top:10px;">
                        {!! \App\Settings::select('facebook_howto')->value('facebook_howto') !!}
                    </div>
                </p>
                @else
                <p class="details"><h5 style="color:red">Sorry!!!</h5> You cannot view Facebook creatives except you upgrade your plan! <strong style="color:white">ou cannot view Facebook creatives except</strong><br><br>
                    <a style="background: #06a4ad !important;
                    border-radius: 30px;
                    padding: 10px 20px !important;
                    color:white;
                    margin: 0 11px;" href="{{ route('plan.upgrade', auth()->user()->plan->id) }}"><strong>Upgrade plan now</strong></a> 
                    </p>
                @endif
            </div>
            @if(isset($upsell_array) && $upsell_array != null)
            <button class="accordion">Upsells</button>
            <div class="panel">
                @if(auth()->user()->plan->viewUpsells == 1)
                <p class="details">
                    
                    <div class="row">
                        @foreach($upsell_array as $upsell)
                        <div class="col-md-3 col-sm-6">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="{{ route('single.upsell', $upsell->slug) }}">
                                        <img class="pic-1" src="{{route('get.upsellfile', $upsell->main_image) }}">
                                        <img class="pic-2" src="{{route('get.upsellfile', $upsell->main_image) }}">
                                    </a>
                                   
                                    <a class="add-to-cart" href="{{ route('single.upsell', $upsell->slug) }}">View</a>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="{{ route('single.upsell', $upsell->slug) }}">{{ $upsell->name }}</a></h3>
                                    <span class="price">&#8358;{{ number_format($upsell->price, 2) }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="row">
                        Watch how to Create your own Upsell Product 
                        
                        {!! \App\Settings::select('upsell_howto')->value('upsell_howto') !!}
                    </div>
                    
                    
                </p>
                @else
                    <h5 style="color:red">Sorry!!!</h5> You cannot view upsell products except you upgrade your plan! <br><br>
                    <p class="details">
                        <a style="background: #06a4ad !important;border-radius: 30px;padding: 10px 20px !important;   color:white; margin: 0 11px;" href="{{ route('plan.upgrade', auth()->user()->plan->id) }}"><strong>Upgrade plan now</strong></a> 
                    </p>
                @endif
                
                </div>
            @endif
            <script>
                var acc = document.getElementsByClassName("accordion");
                var i;

                for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                    } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                    } 
                });
                }
            </script>
           
        </div>

    </div>
</div>
<!-- listing-area Area End -->
@endsection