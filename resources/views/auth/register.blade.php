@extends('layouts.app')
@section('title', 'Register')
@section('slider')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Sign up</h2>
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
                    <h2 style="text-align:center" class="contact-title">Sign up</h2>
                    <p>Please fill in the form below to create an account with us</p>
                </div>
                <div class="col-lg-12">
                   
                    @include('inc.alerts')
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name"  value="{{ old('name')  }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your email'" placeholder="Enter your email"  value="{{ old('email')  }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="username" id="username" type="text"  placeholder="Enter desired username"  value="{{ old('username') }}">
                                </div>
                            </div>
                            @if(request()->get('ref'))
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="refferal" id="refferal" type="text" readonly value="{{ request()->get('ref') }}">
                                </div>
                            </div>
                            @else
                           
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="refferal" id="refferal" type="text" placeholder="Enter referral code (Leave blank if none)"  value="{{ old('refferal') }}">
                                </div>
                            </div>
                            @endif
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your password'" placeholder="Password" value="{{ old('password')  }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" style="margin-bottom:0px !important">
                                    <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your password again'" placeholder="Enter your password again" value="{{ old('password_confirmation')  }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="phone" id="phone" type="tel" placeholder="Enter your phone number, e.g 07000000001" value="{{ old('phone') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-left">
                            <p onclick="oldFunction()" style="margin-top: 00px; margin-bottom:0px !important">
                                <input type="checkbox" id="check" ><small> Show password</small></p>
                            <script>
                                function oldFunction() {
                                    var x = document.getElementById("password");
                                    var y = document.getElementById("password_confirmation");
                                    var c = document.getElementById("check");

                                    if (x.type === "password") {
                                        x.type = "text";
                                        y.type = "text";
                                        c.checked="checked";
                                    } else {
                                        x.type = "password";
                                        y.type = "password";
                                        c.checked="";
                                    }
                                    
                                } 
                            </script>
                            <input type="checkbox" id="agree" name="agree" required>
                            <label><small style="margin-bottom: 0px; margin-bottom: 0px;">I have read and agree to the </small><a href="#"  target="_blank" style="color:green"><u>terms and conditions</u> </a></label><br>
                           
                           </div>
                        
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Sign up</button>
                        </div>
                    </form>
                    <p>Already have an account? <a href="/login" style="color: #3c14ff;">Sign In here</a></p>
                </div>
                
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection

