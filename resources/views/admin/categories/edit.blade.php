@extends('layouts.admindashboard')
@section('title', 'Update category')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('category.index') }}">Product Category</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Update {{ $category->title }}</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Category</h4>
                        @include('inc.alerts')
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $category->title}}" placeholder="Enter Title" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <img src="{{ asset($category->image) }}" alt="category_image" style="width: 10%; height: 10%;"><br> 
                                    
                                    <label for="image">Replace Category image (Optional | 360px by 286px preferred dimensions)</label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="">--Select option</option>
                                        <option value="0" {{ $category->status == 0 ? 'selected' : ''}}>Draft</option>
                                        <option value="1" {{ $category->status == 1 ? 'selected' : ''}}>Published</option>
                                    </select>
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
