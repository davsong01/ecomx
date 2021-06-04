@extends('layouts.admindashboard')
@section('title', 'View suggested products')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('suggestion.index') }}">Suggested Products</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">View Suggested product</li>
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
                           
                           <img style="width: 100%;" src="{{ route('suggestion.file', $suggestion->image ) }}" alt="Suggestion image">

                        </div>
                    </div>
                    <a href="{{ route('suggestion.index') }}" class="btn btn-primary p-1">Back</a>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Inputs end -->          
</div>
@endsection
