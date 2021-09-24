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
                    <h2 class="contact-title">About us</h2>
                    @include('inc.alerts')
                </div>
                <div class="col-12">
                   <p class="normalize">
                    eComX is Nigeria’s fast-rising drop-ship portal and more. <br><br>

                    Providing you with access to unique products you can start selling, not just that; you have access to an already-made Salespage for each product as well as Facebook ad creative to be used on your advert. <br> <br>
                    
                    All you need to launch your Mini Importation/eCommerce business has been made readily available for you to explore and start making money almost immediately. 
                    
                    <br><br>
                    It is as simple as: <br>
                    
                    <b> <i class="fa fa-arrow-right"></i> Choose your preferred product</b> <br>
                    <b><i class="fa fa-arrow-right"></i> Import the Sales page</b><br>
                    <b><i class="fa fa-arrow-right"></i> Launch your advert</b> <br>
                    <b><i class="fa fa-arrow-right"></i> Send your orders to our logistics partner</b> <br> <b><i class="fa fa-arrow-right"></i>Get Remitted Weekly. <br><br> 
                                        
                    <p class="normalize">Start Making 6-7 Figures Monthly In eCom Business With Nearly Zero Budget.</p>
                   
                    <br><br>
                    
                    <a href="/register" class="btn view-btn1">[Get Started now] </a> 
                   </p>
                </div>
                
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
