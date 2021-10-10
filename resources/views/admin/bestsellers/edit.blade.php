@extends('layouts.admindashboard')
@section('title', 'Update bestseller')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('bestseller.index') }}">Bestsellers</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Update {{ $bestseller->product->title }}</li>
@endsection

@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Editing {{ $bestseller->product->title }}</h4>
                        @include('inc.alerts')
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('bestseller.update', $bestseller->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="order">Change Order</label>
                                    <input type="number" class="form-control" name="order" id="order" value="{{ old('order') ?? $bestseller->order }}" placeholder="Enter order" required>
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
