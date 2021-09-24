@extends('layouts.app')
@section('title', 'Forgot password')
@section('slider')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Reset password</h2>
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
    <section class="contact-section">
        <div class="container">
            
            <div class="row">
                <div class="col-12">
                    <h2 style="text-align:center" class="contact-title"></h2>
                    {{-- <p clas="normalize">Please enter the mail you used in registering with us and we will send you a password reset link</p> --}}
                </div>
                <div class="col-lg-12">
                   
                    @include('inc.alerts')
                    <form class="mb-2" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                         <div class="form-group">
                            <label class="text-bold-600" for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $email ?? old('email') }}" placeholder="Enter your email">
                           
                        </div>
                        
                        <div class="form-group">
                            <label class="text-bold-600" for="password">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Enter a new password">
                            
                        </div>
                        <div class="form-group mb-2">
                            <label class="text-bold-600" for="password_confirmation">Confirm New Password</label>
                            <input type="password" class="form-control" value="{{ old('password_confirmation') }}" id="password_confirmation" name="password_confirmation" placeholder="Confirm your new password">
                        </div>
                        <button type="submit" class="btn btn-primary glow position-relative w-100">Reset my password<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                    </form>
                    <p><small><a href="/login" style="color: #3c14ff;">I remember my password!</a></small></p>
                </div>
                
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection