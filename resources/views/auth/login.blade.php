@extends('layouts.app')
@section('title', 'Login')
@section('slider')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Sign in</h2>
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
                    <h2 style="text-align:center" class="contact-title">Sign in</h2>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6" style="margin: 0 auto;">
                   
                    @include('inc.alerts')
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your email'" placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your password'" placeholder="Password" value="{{ old('password')  }}" required>
                                    <p onclick="oldFunction()" style="margin-top: 10px;">
                                        <input type="checkbox" id="check" > &nbsp show password

                                    </p>
                                    <script>
                                        function oldFunction() {
                                            var x = document.getElementById("password");
                                            var c = document.getElementById("check");
                                            
                                            if (x.type === "password") {
                                                x.type = "text";
                                                c.checked="checked";
                                            } else {
                                                x.type = "password";
                                                c.checked="";
                                            }
                                            
                                        } 
                                    </script>
                                </div>
                            </div>
                            
                        </div>
                       
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Login</button>
                        </div>
                    </form>
                    <p>Don't have an account? <a href="/register" style="color: #3c14ff;">Sign Up here</a></p>
                </div>
                
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection