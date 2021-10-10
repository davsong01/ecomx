@extends('layouts.admindashboard')
@section('title', 'Sales page Requests')
@section('active')
<li class="breadcrumb-item">All Requests</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Requests</h4>
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
                                            <th>Email</th>
                                            <th>Product</th>
                                            <th>Date Created</th>
                                            <th>Date Approved</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($requests->sortByDESC('created_at') as $request)
                                        <tr> 
                                            <td>{{ $request->user->name ?? 'N/A' }} </td>
                                            <td>{{ $request->user->phone ?? 'N/A' }} </td>
                                            <td>{{ $request->user->email ?? 'N/A' }} </td>
                                            <td>{{ $request->product->title ?? 'N/A' }} </td>
                                            <td>{{ $request->created_at->format('Y-m-d') }} </td>
                                            <td>{{ $request->approved_at }} </td>
                                            <td>{{ $request->status == 1 ? 'Approved' : 'Pending' }} </td>
                                            <td style="padding-left: 5px;padding-right: 5px; ">
                                                @if($request->status == 0)
                                                <div class="button-group">
                                                    <a class="actions" onclick="return confirm('You are about to approve a salespage request!');" href="{{ route('salespages.approve', $request->id) }}"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="fa fa-check"></i></
                                                    </a>
                                                </div>
                                                @endif
                                                @if($request->status == 1)
                                                <div class="button-group">
                                                    <a class="actions" onclick="return confirm('You are about to unapprove a salespage request!');" href="{{ route('salespages.unapprove', $request->id) }}"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="fa fa-close"></i></
                                                    </a>
                                                </div>
                                                @endif
                                                <div class="button-group">
                                                    <form id="delete" style="float: left;" onsubmit="return confirm('Are you sure you want to delete forever?');" action="{{ route('salespage.destroy', $request->id) }}" method="POST" >
                                                        @csrf
                                                        @method('DELETE') 
                                                        <button class="form-control deletebutton" type="submit"><i class="fa fa-trash" style="color: #950026;"></i></button>
                                                    </form>  
                                                </div>
                                             
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