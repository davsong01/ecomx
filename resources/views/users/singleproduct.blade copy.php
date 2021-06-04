@extends('layouts.dashboard')
@section('slider')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h4 style="color: white;">{{ $product->title }}</h4>
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
                <ul class="blog-info-link mt-3 mb-4">
                    @if(isset($product->category)  &&  count($product->category) > 0)
                    <li>
                        <a href="#"><i class="fa fa-list-alt"></i>
                        @foreach($product->category as $category)
                        <a href="{{ route('showcategory', $category->slug) }}">{{ $category->title }} </a>
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
            <div class="site-section mb-5">
                <div class="owl-2-style">
                  <div class="owl-carousel owl-2">
                    @foreach(json_decode($product->f_image) as $image)  
                    <div>
                      <img src="{{route('get.file', $image) }}" alt="{!! $image !!}" style="max-height:100%; max-width:100%;">
                    </div>
                    @endforeach
                    
                  </div>
                </div>
              </div>
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
            <div class="col-12" style="display: flex;margin-top:10px">
                <p class="details">{!! $product->description !!}</p>
            </div>  
        </div>

        <div class="row">
            <button class="accordion">Salespage</button>
            <div class="panel ck-content">
                @if(auth()->user()->plan->viewCreatives == 1)
                <p class="details">
                    SalesPage Link: <a target="_blank" href="{{ $product->salespage_link }}"> <i class="fa fa-link"></i> Visit link</a> <br>
                    SalesPage demo: <a href="{{ route('downloadsalespagefile', $salespage_file) }}"> <i class="fa fa-download"></i> Download file</a><br><br>
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

            <button class="accordion">Facebook Ads creative</button>
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
                    {{-- <div class="col-12" style="margin-top:10px;"> --}}
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
            {{-- </div>   --}}
        </div>

    </div>
</div>
<!-- listing-area Area End -->
@endsection