@extends('layouts.admindashboard')
@section('title', 'Create bestseller')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('bestseller.index') }}">Bestsellers</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Create new bestseller product</li>
@endsection

@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New bestseller product</h4>
                        @include('inc.alerts')
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('bestseller.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="title">Select Product</label>
                                    <select class="form-control select2" name="product" id="product">
                                        <option value="">--Select Product--</option>
                                        @foreach($products as $product)
                                        <option value="{{ old('product') ?? $product->id }}" {{ old('product') == $product->id ? 'selected' : ''}}>{{ $product->title }}</option>
                                        @endforeach
                                    </select>
                                    
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="order">Order</label>
                                    <input type="number" class="form-control" name="order" id="order" value="{{ old('order') }}" placeholder="Enter order" required>
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
