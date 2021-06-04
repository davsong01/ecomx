@extends('layouts.admindashboard')
@section('title', 'Payouts')
@section('active')
<li class="breadcrumb-item">All Payouts</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Payouts</h4>
                        <a href="{{ route('payouts.create') }}" class="btn btn-primary p-1">Add new payout</a>
                        @include('inc.alerts')
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Amount Requested(&#8358;)</th>
                                            <th>Status</th>
                                            <th>Amount paid(&#8358;)</th>
                                            <th>Date Paid</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($payouts as $payout)
                                        <tr> 
                                            <td>{{ $payout->user->name ?? 'User deleted'}} </td>
                                            <td>{{ $payout->user->phone ?? 'User deleted'}} </td>
                                            <td>{{ $payout->amount_requested }} </td>
                                            <td>{{ $payout->status == 1 ? 'Paid' : 'Pending'}} </td>
                                            <td>{{ $payout->amount_paid }} </td>
                                            <td>{{ $payout->paid_at }} </td>                                            
                                            <td style="padding-left: 5px;padding-right: 5px; ">
                                                
                                                <div class="button-group">
                                                    <a class="actions" href="{{ route('payouts.edit', $payout->id) }}"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="bx bxs-edit"></i></
                                                    </a>
                                                </div>
                                                @if($payout->status == 0 || !isset($payout->user))
                                                <div class="button-group">
                                                    <form id="delete" style="float: left;" onsubmit="return confirm('Are you sure you want to delete forever?');" action="{{ route('payouts.destroy', $payout->id) }}" method="POST" >
                                                        @csrf
                                                        @method('DELETE') 
                                                        <button class="form-control deletebutton" type="submit"><i class="fa fa-trash" style="color: #950026;"></i></button>
                                                    </form>  
                                                </div>
                                                @endif
                                            </td>
                                        </tr>
                                      
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->         
</div>
@endsection