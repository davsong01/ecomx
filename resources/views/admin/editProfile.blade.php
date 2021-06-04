@extends('layouts.admindashboard')
@section('title', 'Update Profile')
@section('active')
<li class="breadcrumb-item">Update Profile</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update {{ auth()->user()->title }} plan</h4>
                        @include('inc.alerts')
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('submit.profile') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? auth()->user()->name }}" placeholder="Enter name" required>
                                </fieldset>
                               
                                <fieldset class="form-group">
                                    <label for="title">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? auth()->user()->email }}" placeholder="Enter email" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="title">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') ?? auth()->user()->phone }}" placeholder="Enter phone" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="title">Change Password</label>
                                    <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Enter password">
                                </fieldset>
                                
                                <button class="btn btn-primary" style="width:100%" type="submit">Update</button>
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
