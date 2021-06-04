@extends('layouts.admindashboard')
@section('title', 'Add Subscriber')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('users.index') }}">All Users</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Add subscriber</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add new subscriber</h4>
                        @include('inc.alerts')
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="phone" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter phone" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="bank_name">Bank Name(Optional)</label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ old('bank_name') }}" placeholder="Enter bank name">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="account_name">Account Name(Optional)</label>
                                    <input type="text" class="form-control" id="account_name" name="account_name" value="{{ old('account_name') }}" placeholder="Enter account name">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="account_number">Account Nnmber(Optional)</label>
                                    <input type="text" class="form-control" id="account_number" name="account_number" value="{{ old('account_number') }}" placeholder="Enter account number">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="referral_bonus">Referral Bonus(Optional)</label>
                                    <input type="number" class="form-control" id="referral_bonus" name="referral_bonus" value="{{ old('referral_bonus') }}" placeholder="Enter referral bonus" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="upline">Upline(Optional)</label>
                                    <select class="form-control" name="upline" id="upline" >
                                        <option value="">--Select option--</option>
                                        @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('upline') == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="account_name">Password(Leave blank to use default: 123454321 )</label>
                                    <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Enter password">
                                </fieldset>
                                
                                <fieldset class="form-group">
                                    <label for="validity">Plan(Optional)</label>
                                    <select class="form-control" name="plan_id" id="plan_id" >
                                        <option value="">--Select option--</option>
                                        @foreach($plans as $plan)
                                        <option value="{{ $plan->id }}" {{ old('plan_id') == $plan->id ? 'selected' : ''}}>{{ $plan->title }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="validity">Validity</label>
                                    <select class="form-control" name="validity" id="validity" >
                                        <option value="">--Select option--</option>
                                        <option value="1" {{ old('validity') == 1 ? 'selected' : ''}} required>1 month</option>
                                        <option value="3" {{ old('validity') == 3 ? 'selected' : ''}} required>3 months</option>
                                        <option value="6" {{ old('validity') == 6 ? 'selected' : ''}} required>6 months</option>
                                        <option value="12" {{ old('validity') == 12 ? 'selected' : ''}} required>12 months</option>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="plan_start">Date Paid(Optional)</label>
                                    <input type="date" class="form-control" id="plan_start" name="plan_start" value="{{ old('plan_start') }}" placeholder="Enter Date Paid">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="plan_expiry">Plan Expiry(Optional)</label>
                                    <input type="date" class="form-control" id="plan_expiry" name="plan_expiry" value="{{ old('plan_expiry') }}" placeholder="Enter Expiry date">
                                </fieldset>
                                
                                
                                <button class="btn btn-primary" style="width:100%" type="submit">Create</button>
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
