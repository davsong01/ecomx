@extends('layouts.admindashboard')
@section('title', 'Edit Product')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('products.index') }}">All Products</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Edit {{ $product->name }}</li>
@endsection
@section('extra-script')
<script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
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
                        
                       <div class="row">  
                        @if(isset($product->f_image) && $product->f_image != 'null')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="text">Product Featured Images</label>
                                </div>
                            </div>
                          
                            @foreach(json_decode($product->f_image) as $image)
                            <div class="col-md-3 col-sm-4">
                            <img src="{{route('get.file', $image) }}" alt="{!! $image !!}" style="width: 100%; height: auto;">
                            <div> 
                            <form action="{{ route('productfile.replace')}}" method="POST" enctype="multipart/form-data">

                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="pid">
                                <input style="font-size: 10px; width: 100%;font-size: 10px !important;float: left;" class="btn btn-primary glow" type="file" name="image" accept="image/*" required>
                                <input type="hidden" value="{{ $image }}" name="old_image">                               
                                <button class="form-control deletebutton" data-toggle="tooltip" title="Replace file"><i class="fa fa-exchange" style="color: #950026;float: left;
                                    border-radius: 0px !important;height: 35px;"></i>Replace</button>
                            </form>  
                            <form action="{{ route('productfile.delete')}}" method="POST">

                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="pid">
                               
                                <input type="hidden" value="{{ $image }}" name="old_image">                               
                                <button class="form-control deletebutton" data-toggle="tooltip" title="delete file"><i class="fa fa-trash" style="color: #950026;float: left;
                                    border-radius: 0px !important;height: 35px;"></i>Delete</button>
                            </form>  
                                   
                              </div>
                            </div>                        
                            @endforeach                                  
                        </div>
                        @endif
                        {{-- @if(isset($product->videos) && $product->videos != 'null')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="text">Product Videos</label>
                                </div>
                            </div>
                            @foreach(json_decode($product->videos) as $video)
                            <div class="col-md-3 col-sm-12">
                                <video width="100%" controls>
                                <source src="{{route('get.file', $video) }}">
                                Your browser does not support HTML video.
                                </video>
                            <img src="" alt="{!! $video !!}" style="width: 100%; height: auto; max-height: 146px !important;">
                            <div> <p style="text-align:center">
                            <div> <p style="text-align:center">
                                <form action="{{ route('productfile.replace')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                   
                                <input style="font-size: 10px;" class="btn btn-primary glow" type="file" name="video" accept="video/*" required>
                                <input type="hidden" value="{{ $video }}" name="old_video">
                                
                                <input type="hidden" value="{{ $product->id }}" name="pid">
                                <button style="margin-top:10px" class="btn btn-primary glow"><small><label for="video" style="color:white">Replace</small></button>
                                </form>
                                
                                </p></div>
                            </div>  
                            </div>                        
                            @endforeach                                  
                        </div>
                        @endif --}}
                            <div class="col-12">
                                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <fieldset class="form-group">
                                        <label for="title">Product Name</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $product->title }}" placeholder="Enter product name">
                                    </fieldset>
    
                                    <fieldset class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control" name="price" id="price" value="{{ old('price') ?? $product->price }}" placeholder="Enter price" required>
                                    </fieldset>
                        
                                    <fieldset class="form-group">
                                        <label for="stock">In Stock</label>
                                        <input type="number" class="form-control" name="stock" id="stock" value="{{ old('stock') ?? $product->stock }}" placeholder="Enter quantity available" required>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="f_images">Add more Featured Images(Optional, 634px by 811px)</label>
                                        <input type="file" class="form-control" name="f_images[]" id="f_images" value="{{ old('f_images') }}" multiple accept="image/*">
                                    </fieldset>
                                    {{-- <fieldset class="form-group">
                                        <label for="videos">Add Product Videos(Optional)</label>
                                        <input type="file" class="form-control" name="videos[]" id="videos" value="{{ old('videos') }}" multiple accept="video/*">
                                    </fieldset> --}}
                                    <fieldset class="form-group">
                                        <label for="videos">Product Video Link(Optional)</label>
                                        <input type="text" class="form-control" name="videos" id="videos" value="{{ old('videos') ?? $product->videos }}" multiple accept="video/*">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="creatives">Creatives</label>
                                        <textarea id="creatives" required="required" type="text" class="form-control" name="creatives" value="{{ old('creatives') }}" rows="8" autofocus>{{ old('creatives') ?? $product->creatives }}</textarea>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="description">Product description</label>
                                        <textarea required="required" type="text" id="description" class="form-control" name="description" value="{{ old('description') ?? $product->description}}" rows="8" autofocus>{{ old('description') ?? $product->description }}</textarea>
                                    </fieldset>
    
                                    <fieldset class="form-group">
                                        <label for="title">Sales Page Link</label>
                                        <input type="url" class="form-control" id="salespage_link" name="salespage_link" value="{{ old('salespage_link') ?? $product->salespage_link }}" placeholder="Enter product salespage link">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        
                                        <label for="salespage_file">Replace Sales Page File (Not more than 1mb )</label><br>
                                        <a style="color:blue" href="{{ route('get.salespagefile', $salespage_file) }}"> {{ $salespage_file }} </a>
                                        <input type="file" class="form-control" id="salespage_file" name="salespage_file" value="{{ old('salespage_file') }}" >
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="status">Upsell Products 
                                        </label>
                                        <select class="form-control select2 js-example-basic-multiple" name="upsell_products[]" id="upsell_products" multiple="multiple" >
                                            @foreach($upsells as $upsell)
                                            <option value="{{ $upsell->id }}" 
                                                @foreach(json_decode($product->upsell_products, false) as $upproduct)
                                                {{ $upproduct == $upsell->id ? 'selected' : ''}}
                                                @endforeach
                                                 >{{ $upsell->name .$upsell->id}}</option>
                                            @endforeach
                                        </select>

                                    </fieldset>
                                    
                                    <fieldset class="form-group">
                                        <label for="status">Category </label>
                                        <select class="form-control select2 js-example-basic-multiple" name="category[]" id="category" multiple="multiple" required>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" 
                                                @foreach($product->category as $cat)
                                                 {{ $cat->id == $category->id ? 'selected' : ''}}
                                                 @endforeach
                                                 >{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status" required>
                                            <option value="0" {{ $product->status == 0 ? 'selected' : ''}}>Draft</option>
                                            <option value="1" {{ $product->status == 1 ? 'selected' : ''}}>Published</option>
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
    </div>
</section>
<!-- Basic Inputs end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>                                         
    <script>
        CKEDITOR.replace( 'creatives', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });

        CKEDITOR.replace( 'description', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
        
    </script>

@endsection
