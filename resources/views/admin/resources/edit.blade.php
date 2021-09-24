@extends('layouts.admindashboard')
@section('title', 'Update resource')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('resource.index') }}">Resources</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Update Resource</li>
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
                            <form action="{{ route('resource.update', $resource->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <fieldset class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $resource->title }}" placeholder="Enter Title" required>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="link">Link</label>
                                        <input type="text" class="form-control" id="link" name="link" value="{{ old('link') ?? $resource->link }}" placeholder="Enter link" required>
                                    </fieldset>
                                    
                                    
                                    <fieldset class="form-group">
                                        <label for="public">Public? (Subscribed and Unsubscribed users can view public resources) | Optional</label>
                                        <select class="form-control" name="public" id="public">
                                            <option value="1" {{ $resource->link == 1 ? 'selected' : ''}}>Yes</option>
                                            <option value="0" {{ $resource->link == 0 ? 'selected' : ''}}>No</option>
                                        </select>
                                    </fieldset>
                                
                                </div>
                                <div class="col-md-6 col-sm-6 edit-link">
                                    {!! $resource->link !!}
                                </div>
                                <br><br>
                                <div class="col-12">
                                    <button class="btn btn-primary p-1" style="width:100%" type="submit">Create</button>
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
</div>
@endsection
