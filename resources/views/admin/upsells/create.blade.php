@extends('layouts.admindashboard')
@section('title', 'Create Upsell')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('upsells.index') }}">Upsells</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Create new Upsell product</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New upsell</h4>
                        @include('inc.alerts')
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('upsells.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name">
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Enter Price" required>
                                </fieldset>
                                
                                <fieldset class="form-group">
                                    <label for="video_link">Link to video (Optional)</label>
                                    <input type="text" class="form-control" id="video_link" name="video_link" value="{{ old('video_link') }}" placeholder="Enter video link" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="f_images">Featured Images</label>
                                    <input type="file" class="form-control" name="f_images[]" id="f_images" value="{{ old('f_images') }}" required multiple accept="image/*" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="" {{ old('status') == '' ? 'selected' : ''}}>--Select option</option>
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
