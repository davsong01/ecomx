@extends('layouts.dashboard')
@section('slider')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>My Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
@endsection
@section('title', 'Update Profile')
@section('inactive', 'Home')
@section('active', 'My Pofile')
@section('main')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-12">
                <div class="card">
                   
                    <div class="card-content">
                        <div class="card-body">
                            <div class="col-lg-6 col-sm-12 col-md-6" style="margin: 0 auto;">
                        
                                @include('inc.alerts')
                                <form action="{{ route('save_profile') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="col-md-12 col-sm-12">
                                    <h4>Update Profile</h4>
                                    <fieldset class="form-group">
                                        <label for="username">Plan</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->plan->title }}" disabled>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label>Referral bonus(&#8358;)</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->referral_bonus }}" disabled>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label>Referral link</label>
                                        <input type="text" class="form-control" value="{{ config('app.url').'/register?ref='.auth()->user()->username }}" disabled>
                                        <div>
                                            <a href="#" style="" onclick="myFunction()">Copy referral link</a>
                                            <input  style="color: #faebd700;background: #fff0; border: #fff0;" type="text" value="{{ config('app.url').'/register?ref='. auth()->user()->username }}" id="myInput" >         
                                        </div>
                                    </fieldset>                      
            
                                    <script>
                                        function myFunction() {
                                            var copyText = document.getElementById("myInput");
                                            copyText.select();
                                            copyText.setSelectionRange(0, 99999)
                                            document.execCommand("copy");
                                            copyText.style.visibility = 'hidden';
                                            alert("Referral link copied!");
                                        }
                                    </script>
                                    <fieldset class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? auth()->user()->name }}" placeholder="Enter name">
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->username }}" disabled>
                                    </fieldset>
  
                                    <fieldset class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') ?? auth()->user()->email }}" required>
                                    </fieldset>   
                                    <fieldset class="form-group">
                                        <label for="phone">Phone</label>
                                        <input class="form-control" name="phone" id="phone" type="tel" placeholder="Enter your phone number,  e.g 07068590320" pattern="[0-9]{11}" value="{{ old('phone') ?? auth()->user()->phone  }}" required>
                                        
                                    </fieldset>
                                    <h4>Bank details for referral bonus payouts</h4>
                                    <fieldset class="form-group">
                                        <label for="bank_name">Bank Name(Optional)</label>
                                        <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{ old('bank_name') ?? auth()->user()->bank_name }}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="account_name">Account Name(Optional)</label>
                                        <input type="text" class="form-control" name="account_name" id="account_name" value="{{ old('account_name') ?? auth()->user()->account_name }}">
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="account_number">Account Number(Optional)</label>
                                        <input type="text" class="form-control" name="account_number" id="account_number" value="{{ old('account_number') ?? auth()->user()->account_number }}">
                                    </fieldset>
            
                                    <fieldset class="form-group">
                                        <label for="password"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                        Change Password</label><small class="text-muted"><i style="color:red"> (Leave blank except you want to reset your password)</i></small>
                                        <input type="text" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="Enter password">
                                    </fieldset>
    
                                    <button class="btn btn-primary" style="width:100%" type="submit">Update Profile</button>
                                    
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Inputs end -->          
</div>
@endsection