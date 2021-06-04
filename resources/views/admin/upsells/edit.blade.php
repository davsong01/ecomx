@extends('layouts.admindashboard')
@section('title', 'Update upsell product')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('upsells.index') }}">All upsells</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Update {{ $upsell->name }}</li>
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
                        <div class="col-md-12 col-sm-12">
                            @if(isset($upsell->f_images) && $upsell->f_images != 'null')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="text">Upsell Featured Images</label>
                                    </div>
                                </div>
                                @foreach(json_decode($upsell->f_images) as $image)
                                <div class="col-md-3 col-sm-6">
                                <img src="{{route('get.upsellfile', $image) }}" alt="{!! $image !!}" style="width: 100%; height: auto;">
                                <div> <p style="text-align:center">
                                   
                                    <form action="{{ route('upsellfile.replace')}}" method="POST" enctype="multipart/form-data">

                                        @csrf
                                        <input type="hidden" value="{{ $upsell->id }}" name="pid">
                                        <input style="font-size: 10px; width: 100%;font-size: 10px !important;float: left;" class="btn btn-primary glow" type="file" name="image" accept="image/*" required>
                                        <input type="hidden" value="{{ $image }}" name="old_image">                               
                                        <button class="form-control deletebutton" data-toggle="tooltip" title="Replace file"><i class="fa fa-exchange" style="color: #950026;float: left;
                                            border-radius: 0px !important;height: 35px;"></i>Replace</button>
                                    </form>  
                                    <form action="{{ route('upsellfile.delete')}}" method="POST">

                                        @csrf
                                        <input type="hidden" value="{{ $upsell->id }}" name="pid">
                                       
                                        <input type="hidden" value="{{ $image }}" name="old_image">                               
                                        <button class="form-control deletebutton" data-toggle="tooltip" title="delete file"><i class="fa fa-trash" style="color: #950026;float: left;
                                            border-radius: 0px !important;height: 35px;"></i>Delete</button>
                                    </form>  
                                    </p></div>
                                </div>                        
                                @endforeach                                  
                            </div>
                            @endif
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <form action="{{ route('upsells.update', $upsell->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <fieldset class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $upsell->name }}" placeholder="Enter name">
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" name="price" id="price" value="{{ old('price') ?? $upsell->price }}" placeholder="Enter Price" required>
                                </fieldset>
                                
                                <fieldset class="form-group">
                                    <label for="video_link">Link to video (Optional)</label>
                                    <input type="text" class="form-control" id="video_link" name="video_link" value="{{ old('video_link') ?? $upsell->video_link }}" placeholder="Enter video link" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="f_images">Add more Featured Images(Optional, 634px by 811px)</label>
                                    <input type="file" class="form-control" name="f_images[]" id="f_images" value="{{ old('f_images') }}" multiple accept="image/*">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="">--Select option</option>
                                        <option value="0" {{ $upsell->status == 0 ? 'selected' : ''}}>Draft</option>
                                        <option value="1" {{ $upsell->status == 1 ? 'selected' : ''}}>Published</option>
                                    </select>
                                </fieldset>
                                <button class="btn btn-primary" style="width:100%" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-header">
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic Inputs end -->
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('textckeditor');
    CKEDITOR.replace('imagesckeditor');
    CKEDITOR.replace('videosckeditor'); 
</script>

@endsection
