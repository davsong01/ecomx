
@extends('layouts.admindashboard')
@section('title', 'Dashboard')
@section('active')
<li class="breadcrumb-item">Dashboard</li>
@endsection
@section('content')
<div class="content-body">
    @include('inc.alerts')
    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
        <div class="row">
            <!-- Website Analytics Starts-->
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">System Analytics</h4>
                    </div>
                   
                </div>

            </div>
        </div>
    </section>
        <!-- Dashboard Ecommerce Starts -->
        <section id="dashboard-ecommerce">
            <div class="row">
                <div class="col-md-12 dashboard-users">
                    <div class="row  ">
                        <!-- Statistics Cards Starts -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-4 col-12 dashboard-users-success">
                                    <div class="card text-center">
                                        
                                        <a href="{{ route('users.index') }}">
                                            <div class="card-content">
                                                <div class="card-body py-1">
                                                    <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                                        <i class="bx bxs-user-pin"></i>
                                                    </div>
                                                    <div class="text-muted line-ellipsis"> {{ $subscribers }} Subscribers</div>
                                                    <h3 class="mb-0"></h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12 dashboard-users-danger">
                                    <div class="card text-center">
                                        <a href="{{ route('users.index') }}">
                                            <div class="card-content">
                                                <div class="card-body py-1">
                                                    <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto mb-50">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <div class="text-muted line-ellipsis">{{ $paidSubscribers }} Active Subscribers</div>
                                                    <h3 class="mb-0"></h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12 dashboard-users-danger">
                                    <div class="card text-center">
                                        <a href="{{ route('products.index') }}">
                                            <div class="card-content">
                                                <div class="card-body py-1">
                                                    <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                                        <i class="bx bx-receipt"></i>
                                                    </div>
                                                    <div class="text-muted line-ellipsis">{{ $products }} Products</div>
                                                    <h3 class="mb-0"></h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Revenue Growth Chart Starts -->
                    </div>
                </div>
            </div> 
        </section>
        <!-- Dashboard Ecommerce ends --
</div>
@endsection