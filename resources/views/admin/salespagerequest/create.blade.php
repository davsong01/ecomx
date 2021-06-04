@extends('layouts.admindashboard')
@section('title', 'Add Payout')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('payouts.index') }}">All Payouts</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Add payout</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create payout</h4>
                        @include('inc.alerts')
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('payouts.store') }}" method="POST">
                            @csrf
                           
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="name">Subscriber</label>
                                    <select class="form-control" name="user_id" id="user_id" required>
                                        <option value="">--Select Subscriber --</option>
                                        @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }} (&#8358;{{$user->referral_bonus}})</option>
                                        @endforeach
                                    </select>

                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="amount_requested">Amount Requested</label>
                                    <input type="number" class="form-control" id="amount_requested" name="amount_requested" value="{{ old('amount_requested') }}" placeholder="Enter amount requested" required>
                                </fieldset>
                               
                                <fieldset class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Paid</option>
                                         <option value="0" {{ old('status') == '0' ? 'selected' : ''}}>Pending</option>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="amount_paid">Amount paid</label>
                                    <input type="number" class="form-control" id="amount_paid" name="amount_paid" value="{{ old('amount_paid') }}" placeholder="Enter amount paid">
                                </fieldset>  
                                <fieldset class="form-group">
                                    <label for="paid_at">Date paid</label>
                                    <input type="date" class="form-control" id="paid_at" name="paid_at" value="{{ old('paid_at') }}">
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
