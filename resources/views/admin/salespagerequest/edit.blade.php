@extends('layouts.admindashboard')
@section('title', 'Edit Payout')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('payouts.index') }}">All Payouts</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Edit {{ $payout->name }}</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit {{ $payout->user->name }}'s payout</h4>
                        @include('inc.alerts')
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('payouts.update', $payout->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to update this request? This action cannot be undone!');">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" value="{{ old('name') ?? $payout->user->name }}" placeholder="Enter name" required disabled>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="amount_requested">Amount Requested</label>
                                    <input type="number" class="form-control" id="amount_requested" name="amount_requested" value="{{ old('amount_requested') ?? $payout->amount_requested }}" disabled placeholder="Enter amount requested">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="name">Bank name</label>
                                    <input type="text" class="form-control" value="{{ $payout->user->bank_name }}" disabled>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="name">Account name</label>
                                    <input type="text" class="form-control" value="{{ $payout->user->account_name }}" disabled>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="name">Account Number</label>
                                    <input type="text" class="form-control" value="{{ $payout->user->account_number }}" disabled>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="1" {{ $payout->status == '1' ? 'selected' : '' }}>Paid</option>
                                         <option value="0" {{ $payout->status == '0' ? 'selected' : ''}}>Pending</option>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="amount_paid">Amount paid</label>
                                    <input type="number" class="form-control" id="amount_paid" name="amount_paid" value="{{ old('amount_paid') ?? $payout->amount_paid }}" placeholder="Enter amount paid" required>
                                </fieldset>  
                                <fieldset class="form-group">
                                    <label for="paid_at">Date paid(Optiona)</label>
                                    <input type="date" class="form-control" id="paid_at" name="paid_at" value="{{ old('paid_at') ?? $payout->paid_at }}">
                                </fieldset>                                
                                @if($payout->status == 0)
                                <button class="btn btn-primary" style="width:100%" type="submit">Update</button>
                                @endif    
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
