@extends('layouts.admindashboard')
@section('title', 'Create Product')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('products.index') }}">All Products</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Create Product</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Product</h4>
                        @include('inc.alerts')
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="title">Product Name</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter product name">
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Enter Price" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="stock">In stock</label>
                                    <input type="number" class="form-control" name="stock" id="stock" value="{{ old('stock') }}" placeholder="Enter quantity available" required>
                                </fieldset>
                                
                                <fieldset class="form-group">
                                    <label for="f_images">Featured Images</label>
                                    <input type="file" class="form-control" name="f_images[]" id="f_images" value="{{ old('f_images') }}" required multiple accept="image/*">
                                </fieldset>
                                {{-- <fieldset class="form-group">
                                    <label for="videos">Product Videos(Optional)</label>
                                    <input type="file" class="form-control" name="videos[]" id="videos" value="{{ old('videos') }}"  multiple accept="video/*">
                                </fieldset> --}}

                                <fieldset class="form-group">
                                    <label for="videos">Product Videos Link(Youtube link | Optional)</label>
                                    <input type="url" class="form-control" name="videos" id="videos" value="{{ old('videos') }}">
                                </fieldset>
                                
                                <fieldset class="form-group">
                                    <label for="creatives">Creatives</label>
                                    <textarea id="summary-ckeditor" required="required" type="text" class="form-control" name="creatives" value="{{ old('creatives') }}" rows="8" autofocus>{{ old('creatives') }}</textarea>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="description">Product description</label>
                                    <textarea required="required" id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" rows="8" autofocus>{{ old('description') }}</textarea>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="title">Sales Page Link</label>
                                    <input type="url" class="form-control" id="salespage_link" name="salespage_link" value="{{ old('salespage_link') }}" placeholder="Enter product salespage link">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="salespage_file">Sales Page File (Not more than 1mb )</label>
                                    <input type="file" class="form-control" id="salespage_file" name="salespage_file" value="{{ old('salespage_file') }}" >
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="status">Upsells (Optional)</label>
                                    <select class="form-control select2 js-example-basic-multiple" name="upsell[]" id="upsell" multiple="multiple">
                                       
                                        @foreach($upsells as $upsell)
                                        <option value="{{ $upsell->id }}" {{ old('upsell') == $upsell->id ? 'selected' : ''}}>{{ $upsell->name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="status">Category</label>
                                    <select class="form-control select2 js-example-basic-multiple" name="category[]" id="category" multiple="multiple" required>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : ''}}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>                                         
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
        CKEDITOR.replace( 'summary-ckeditor', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });

        CKEDITOR.replace( 'description', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        
        
        
    </script>
@endsection
