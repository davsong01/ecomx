@extends('layouts.admindashboard')
@section('title', 'Update Testimonial')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('testimonials.index') }}">All Testimonials</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Edit testimonial</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @include('inc.alerts')
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $testimonial->name}}" placeholder="Enter name" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $testimonial->title}}" placeholder="Enter Title" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="content">Content</label>
                                    <textarea id="content" required="required" type="text" class="form-control" name="content" value="{{ old('content') ?? $testimonial->content}}" rows="20" autofocus>{{ old('content') ?? $testimonial->content }}</textarea>
                                </fieldset>
                                <fieldset class="form-group">
                                    <img src="{{ asset($testimonial->image) }}" alt="category_image" style="width: 10%; height: 10%;"><br> 
                                    
                                    <label for="image">Replace Testimonial image(jpeg, jpg, png accepted)</label>
                                    <input type="file" class="form-control" id="facebook_link" name="image" value="{{ old('image') }}" accept="image/*" >
                                </fieldset>
                                
                                <fieldset class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="0" {{  $testimonial->status  == 0 ? 'selected' : ''}}>Draft</option>
                                        <option value="1" {{ $testimonial->status == 1 ? 'selected' : ''}}>Published</option>
                                    </select>
                                </fieldset>
                                <button class="btn btn-primary p-1" style="width:100%" type="submit">Update</button>
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
