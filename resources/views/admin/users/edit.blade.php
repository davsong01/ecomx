@extends('layouts.admindashboard')
@section('title', 'Edit Subscriber')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('users.index') }}">All Users</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Edit {{ $user->name }}</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit {{ $user->name }}</h4>
                        @include('inc.alerts')
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $user->name }}" placeholder="Enter name" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? $user->email }}" placeholder="Enter email" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input class="form-control" name="phone" id="phone" type="tel" placeholder="Enter phone number, e.g 07000000001" pattern="[0-9]{11}" value="{{ old('phone') ?? $user->phone  }}" required>
                                   
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="bank_name">Bank Name(Optional)</label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ old('bank_name') ?? $user->bank_name }}" placeholder="Enter bank name">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="account_name">Account Name(Optional)</label>
                                    <input type="text" class="form-control" id="account_name" name="account_name" value="{{ old('account_name') ?? $user->account_name }}" placeholder="Enter account name">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="account_number">Account Nnmber(Optional)</label>
                                    <input type="text" class="form-control" id="account_number" name="account_number" value="{{ old('account_number') ?? $user->account_number }}" placeholder="Enter account number">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="referral_bonus">Referral Bonus(Optional)</label>
                                    <input type="number" class="form-control" id="referral_bonus" name="referral_bonus" value="{{ old('referral_bonus') ?? $user->referral_bonus }}" placeholder="Enter referral bonus" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="upline">Upline(Optional)</label>
                                    <select class="form-control" name="MY_upline" id="MY_upline" >
                                        @if($user->upline)
                                        @foreach($users as $upline)
                                        <option value="{{ $upline->id }}" {{ $user->upline->id == $upline->id ? 'selected' : ''}}>{{ $upline->name }}</option>
                                        @endforeach
                                        @else
                                        <option value="">-- Select Option --</option>
                                        @foreach($users as $upline)
                                        <option value="{{ $upline->id }}" {{ old('MY_upline') == $upline->id ? 'selected' : ''}}>{{ $upline->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="account_name">Password(Leave blank to use default: 123454321 )</label>
                                    <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Enter password">
                                </fieldset>
                                
                                <fieldset class="form-group">
                                    <label for="plan_id">Plan(Optional)</label>
                                    <select class="form-control" name="plan_id" id="plan_id" >
                                        <option value="">Select Plan</option>
                                        @foreach($plans as $plan)
                                        @if($user->plan)
                                        <option value="{{ $plan->id }}" {{ $user->plan->id == $plan->id ? 'selected' : ''}}>{{ $plan->title }}</option>
                                        @else
                                        
                                        <option value="{{ $plan->id }}" {{ old('plan_id') == $plan->id ? 'selected' : ''}}>{{ $plan->title }}</option>
                                       
                                        @endif
                                        @endforeach
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="salespage_limit">Salespage monthly limit </label>
                                    <input class="form-control" type="number" name="salespage_limit" id="salespage_limit" value="{{ old('salespage_limit') ?? $user->salespage_limit }}">
                                   
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="validity">Validity </label>
                                    <select class="form-control" name="validity" id="validity" >
                                        <option value="1" {{ ($user->validity >= 1 && $user->validity < 3) ? 'selected' : ''}}>1 month</option>
                                        <option value="3" {{ ($user->validity >= 3 && $user->validity < 6) ? 'selected' : ''}}>3 months</option>
                                        <option value="6" {{ ($user->validity >= 6 && $user->validity < 9) ? 'selected' : ''}}>6 months</option>
                                        <option value="12" {{ ($user->validity >= 12) ? 'selected' : ''}}>12 months</option>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="plan_start">Date Paid (Optional)</label>
                                    <input required type="date" class="form-control" id="plan_start" name="plan_start" value="{{ old('plan_start') ??  \Illuminate\Support\Carbon::parse($user->plan_start)->format('Y-m-d')  }}" placeholder="Enter Date Paid">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="plan_expiry">Plan Expiry (Optional)</label>
                                    <input required type="date" class="form-control" id="plan_expiry" name="plan_expiry" value="{{ old('plan_expiry') ?? \Illuminate\Support\Carbon::parse($user->plan_expiry)->format('Y-m-d')  }}" placeholder="Enter Expiry date">
                                </fieldset>
                                
                                <button class="btn btn-primary p-1" style="width:100%" type="submit">Create</button>
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
