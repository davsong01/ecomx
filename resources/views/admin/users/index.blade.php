@extends('layouts.admindashboard')
@section('title', 'Subscribers')
@section('active')
<li class="breadcrumb-item">All Subscribers</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Subscribers</h4>
                        <a href="{{ route('users.create') }}" class="btn btn-primary p-1">Add new subscriber</a>
                        @include('inc.alerts')
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Upline</th>
                                            <th>Bonus</th>
                                            <th>Plan</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subscribers as $user)
                                        <tr> 
                                            <td>{{ $user->name }} </td>
                                            <td>{{ $user->username }} </td>
                                            <td>{{ $user->email }} </td>
                                            <td>{{ $user->phone }} </td>
                                            <td>{{ isset($user->upline)? $user->upline->name : 'N/A' }} </td>
                                            <td>&#8358;{{ $user->referral_bonus }} </td>
                                            <td>@if(isset($user->plan))
                                                {{ $user->plan->title }} 
                                                @if($user->plan_expiry < now())
                                               <i data-toggle="tooltip" data-placement="top" title="Plan has expired" style="color: red;" class="fa fa-info-circle"></i>
                                                @endif
                                                <br>
                                                <small><span style="color:green">Start: {{ isset($user->plan_start) ?\Illuminate\Support\Carbon::parse($user->plan_start) : $user->plan_start }} </span> 
                                                <br><span style="color:red">End: {{ isset($user->plan_expiry) ?\Illuminate\Support\Carbon::parse($user->plan_expiry) : $user->plan_expiry}} </span></small>
                                            </td>
                                            @else N/A
                                            @endif
                                            <td style="padding-left: 5px;padding-right: 5px; ">
                                                
                                                <div class="button-group">
                                                    <a class="actions" href="{{ route('users.edit', $user->id) }}"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="bx bxs-edit"></i></
                                                    </a>
                                                </div>
                                                <div class="button-group">
                                                    <a class="actions" data-toggle="tooltip" data-placement="top" title="Switch To" href="{{ route('switchuser', $user->id) }}"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="fa fa-unlock"></i>
                                                    </a>
                                                </div>
                                                <div class="button-group">
                                                    <form id="delete" style="float: left;" onsubmit="return confirm('Are you sure you want to delete forever?');" action="{{ route('users.destroy', $user->id) }}" method="POST" >
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