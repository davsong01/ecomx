@extends('layouts.admindashboard')
@section('title', 'Edit staff')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('staff.index') }}">All Staff</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Edit staff</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit staff</h4>
                        @include('inc.alerts')
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('staff.update', $staff->id) }}" method="POST">
                            @csrf
                            @method('Patch')
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $staff->name}}" placeholder="Enter name" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? $staff->email}}" placeholder="Enter email" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="phone" class="form-control" id="phone" name="phone" value="{{ old('phone') ?? $staff->phone}}" placeholder="Enter phone" required>
                                </fieldset>
                            
                                <fieldset class="form-group">
                                    <label for="level">Admin Rights</label>
                                    <select class="form-control" name="level" id="level" >
                                        <option value="2" {{ $staff->level == 2 ? 'selected' : ''}}>Admin</option>
                                        <option value="3" {{  $staff->level == 3 ? 'selected' : ''}}>User Manager</option>
                                        <option value="4" {{  $staff->level== 4 ? 'selected' : ''}}>Product Manager</option>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="account_name">Password(Leave blank to use default: 123454321 )</label>
                                    <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Enter password">
                                </fieldset>
                                                            
                                <button class="btn btn-primary pt-1" style="width:100%" type="submit">Create</button>
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
