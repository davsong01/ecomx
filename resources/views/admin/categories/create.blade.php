@extends('layouts.admindashboard')
@section('title', 'Create Category')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('category.index') }}">categorys</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Create category</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New category</h4>
                        @include('inc.alerts')
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter Title" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="image">Category Image (360px by 286px preferred dimensions)</label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="">--Select option</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : ''}}>Draft</option>
                                        <option value="1" {{ old('status') == 1 ? 'selected' : ''}}>Published</option>
                                    </select>
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
