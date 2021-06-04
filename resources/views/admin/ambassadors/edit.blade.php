@extends('layouts.admindashboard')
@section('title', 'Update Ambassador')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('ambassadors.index') }}">All Ambassaadors</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Edit Ambassador</li>
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
                            <form action="{{ route('ambassadors.update', $ambassador->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $ambassador->name}}" placeholder="Enter name" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $ambassador->title}}" placeholder="Enter Title" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="linkedin_link">LinkedIn Link</label>
                                    <input type="url" class="form-control" id="linkedin_link" name="linkedin_link" value="{{ old('linkedin_link') ?? $ambassador->linkedin_link }}" placeholder="Enter linkedin link" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="linkedin_link">Twittter Link</label>
                                    <input type="url" class="form-control" id="twitter_link" name="twitter_link" value="{{ old('twitter_link') ?? $ambassador->twitter_link }}" placeholder="Enter twitter link" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="facebook_link">Facebook Link</label>
                                    <input type="url" class="form-control" id="facebook_link" name="facebook_link" value="{{ old('facebook_link') ?? $ambassador->facebook_link }}" placeholder="Enter facebook link" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <img src="{{ asset($ambassador->image) }}" alt="category_image" style="width: 10%; height: 10%;"><br> 
                                    
                                    <label for="image">Replace Ambassador's image(400px by 450px preffered dimension | jpeg, jpg, png accepted)</label>
                                    <input type="file" class="form-control" id="facebook_link" name="image" value="{{ old('image') }}" accept="image/*" >
                                </fieldset>
                                
                                <fieldset class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="0" {{  $ambassador->status  == 0 ? 'selected' : ''}}>Draft</option>
                                        <option value="1" {{ $ambassador->status == 1 ? 'selected' : ''}}>Published</option>
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
