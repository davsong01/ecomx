@extends('layouts.admindashboard')
@section('title', 'Update Plan')
@section('item')
<li class="breadcrumb-item"> <a href="{{ route('plans.index') }}">Plans</a></li>
@endsection
@section('active')
<li class="breadcrumb-item">Update Plan</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update {{ $plan->title }} plan</h4>
                        @include('inc.alerts')
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('plans.update', $plan->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $plan->title }}" placeholder="Enter Title" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="features">Features(Put each feature on a new line)</label>
                                    <textarea required="required" type="text" class="form-control" name="features" value="{{ old('features') ?? $plan->features }}" rows="6">
                                        @foreach(json_decode($plan->features) as $feature)
                                        {{ $feature }}
                                        @endforeach
                                    </textarea>
                                </fieldset>
                                
                                <fieldset class="form-group">
                                    <label for="mprice">Monthly Price</label>
                                    <input type="number" class="form-control" name="mprice" id="mprice" value="{{ old('mprice') ??  $plan->mprice }}" placeholder="Enter monthly Price" required>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="three
                                    threemprice">3 Months Price</label>
                                    <input type="number" class="form-control" name="threemprice" id="three" value="{{ old('threemprice') ??  $plan->threemprice  }}" placeholder="Enter 3 months Price" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="threempercentoff">3 Months Percent off</label>
                                    <input type="number" class="form-control" name="threempercentoff" id="threempercentoff" value="{{ old('threempercentoff') ??  $plan->threempercentoff  }}" placeholder="Enter 3 months percent off" required>
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="sixmprice">6 Months Price</label>
                                    <input type="number" class="form-control" name="sixmprice" id="sixmprice" value="{{ old('sixmprice') ?? $plan->sixmprice }}" placeholder="Enter six months Price" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="sixmpercentoff">6 Months Percent off</label>
                                    <input type="number" class="form-control" name="sixmpercentoff" id="sixmpercentoff" value="{{ old('sixmpercentoff') ?? $plan->sixmpercentoff}}" placeholder="Enter 6 months percent off" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="twelvemprice">12 Months Price</label>
                                    <input type="number" class="form-control" name="twelvemprice" id="twelvemprice" value="{{ old('twelvemprice') ?? $plan->twelvemprice }}" placeholder="Enter twelve months Price" required>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="twelvempercentoff">12 Months Percent off</label>
                                    <input type="number" class="form-control" name="twelvempercentoff" id="twelvempercentoff" value="{{ old('twelvempercentoff') ?? $plan->twelvempercentoff}}" placeholder="Enter 12 months percent off" required>
                                </fieldset>
                                                               
                                <fieldset class="form-group">
                                    <label for="viewProducts">Can plan view products</label>
                                    <select class="form-control" name="viewProducts" id="viewProduct" required>
                                        
                                        <option value="1" {{ $plan->viewProducts == 1 ? 'selected' : ''}}>Yes</option>
                                        <option value="0" {{ $plan->viewProducts == 0 ? 'selected' : ''}}>No</option>
                                        
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="viewUpsells">Can plan view upsells</label>
                                    <select class="form-control" name="viewUpsells" id="viewUpsells" required>
                                  
                                        <option value="1" {{ $plan->viewUpsells == 1 ? 'selected' : ''}}>Yes</option>
                                        <option value="0" {{ $plan->viewUpsells == 0 ? 'selected' : ''}}>No</option>
                                        
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="viewfeaturess">Can plan view Creatives</label>
                                    <select class="form-control" name="viewCreatives" id="viewCreatives" required>
                                       
                                        <option value="1" {{ $plan->viewCreatives == 1 ? 'selected' : ''}}>Yes</option>
                                        <option value="0" {{ $plan->viewCreatives == 0 ? 'selected' : ''}}>No</option>
                                        
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="status">Plan Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="0" {{ $plan->status == 0 ? 'selected' : ''}}>Draft</option>
                                        <option value="1" {{ $plan->status == 1 ? 'selected' : ''}}>Published</option>
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
