@extends('layouts.app')
@section('slider')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Contact Us</h2>
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
                    <h2 class="contact-title">Get in Touch</h2>
                    @include('inc.alerts')
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="{{ route('submit.contact') }}" method="post">
                        @csrf
                        <div class="row">
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input class="form-control valid" name="name" value="{{ old('name') }}" id="name" type="text" placeholder="Enter your name" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input class="form-control valid" value="{{ old('email') }}" name="email" id="email" type="email" placeholder="Enter your email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Message</label>
                                    <textarea required class="form-control w-100" name="message" id="message" cols="30" rows="5" value="{{ old('message') }}" placeholder=" Enter Message">{{ old('message') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">{{getCaptchaQuestion()}}</label>
                                    <input class="form-control w-100" name="_answer" type="number" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Suite A12 Amori Complex, Orelope B/stop</h3>
                            <p>Egbeda, Lagos, Nigeria</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>08086607905, 08080889261</h3>
                            <p>Mon to Fri 9am to 5pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>support@ecomx.com.ng</h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
