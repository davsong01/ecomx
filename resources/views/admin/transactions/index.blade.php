@extends('layouts.admindashboard')
@section('title', 'Transactions history')
@section('active')
<li class="breadcrumb-item">Transactions</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('transactions.create') }}" onclick="return confirm('Are you sure you want to delete all transaction history? This action cannot be undone');" class="btn btn-primary p-1">Clear all transaction history</a>
                       
                        @include('inc.alerts')
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Expiry</th>
                                            <th>Plan</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Reference</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transactions as $transaction)
                                        <tr> 
                                            <td>{{ $transaction->user->username }}</td>
                                            <td>{{ $transaction->plan_start }}</td>
                                            <td>{{ $transaction->plan_expiry }}</td>
                                            <td>{{ $transaction->plan->title }}</td>
                                            <td>&#8358;{{ $transaction->amount }}</td>
                                            <td>{{ ($transaction->type == 1) ? 'New Plan' : 'Plan Upgrade' }}</td>
                                            <td>{{ $transaction->reference }}</td>
                                            {{-- <td style="padding-left: 5px;padding-right: 5px; ">
                                                <div class="button-group">
                                                    <a class="actions" data-toggle="tooltip" title="View/Edit upsell" href="{{ route('transactions.edit', $transaction->id) }}"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="bx bxs-edit"></i></
                                                    </a>
                                                </div>
                                                <div class="button-group">
                                                    <form id="delete" style="float: left;" onsubmit="return confirm('Are you sure you want to delete forever?');" action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" >
                                                        @csrf
                                                        @method('DELETE') 
                                                        <button class="form-control deletebutton" type="submit"><i class="fa fa-trash" style="color: #950026;"></i></button>
                                                    </form>  
                                                </div>
                                            </td> --}}
                                           
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