@extends('layouts.admindashboard')
@section('title', 'Create resource')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('resource.index') }}">Resources</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Create Resource</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Resource</h4>
                        @include('inc.alerts')
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('resource.store') }}" method="POST">
                            @csrf
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter Title" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}" placeholder="Enter link" required>
                                </fieldset>
                                
                                
                                <fieldset class="form-group">
                                    <label for="public">Public? (Subscribed and Unsubscribed users can view public resources) | Optional</label>
                                    <select class="form-control" name="public" id="public">
                                        <option value="">--Select option</option>
                                        <option value="1" {{ old('public') == 1 ? 'selected' : ''}}>Yes</option>
                                        <option value="0" {{ old('public') == 0 ? 'selected' : ''}}>No</option>
                                        
                                    </select>
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
