@extends('layouts.admindashboard')
@section('title', 'Update setting')
@section('active')
<li class="breadcrumb-item">Settings</li>
@endsection
@section('content')
@section('content')
<div class="content-body">

<section id="input-with-icons">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ config('app.name') }} Settings</h4>
                    @include('inc.alerts')
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-12">
                                    <p>You can set Application variables here</p>
                                </div>
                                
                                <div class="col-sm-12 col-md-12">
                                    <label for="referral_percent">Referral Percent</label>
                                    <fieldset class="form-group ">
                                        <input type="number" class="form-control" name="referral_percent" value="{{ old('referral_percent') ?? $setting->referral_percent }}" id="referral_percent">
                                    </fieldset>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <label for="referral_threshold">Referral minimum amount for withdrawal</label>
                                    <fieldset class="form-group ">
                                        <input type="number" class="form-control" name="referral_threshold" value="{{ old('referral_threshold') ?? $setting->referral_threshold }}" id="referral_threshold">
                                    </fieldset>
                                </div>
                                
                                <div class="col-sm-12 col-md-12">
                                    <label for="official_mail">Official Email</label>
                                    <fieldset class="form-group ">
                                        <input type="text" class="form-control" name="official_mail" value="{{ old('official_mail') ?? $setting->official_mail }}" id="official_mail">
                                    </fieldset>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <label for="suggestion_mail">Suggestions Email</label>
                                    <fieldset class="form-group ">
                                        <input type="text" class="form-control" name="suggestion_mail" value="{{ old('suggestion_mail') ?? $setting->suggestion_mail }}" id="suggestion_mail">
                                    </fieldset>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <label for="salespage_howto">How to create Sales Page Video Link(Full embed link)</label>
                                    <fieldset class="form-group ">
                                        <input type="text" class="form-control" name="salespage_howto" value="{{ old('salespage_howto') ?? $setting->salespage_howto }}" id="salespage_howto" required>
                                    </fieldset>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <label for="facebook_howto">How to create Facebook creatives video Link(Full embed link)</label>
                                    <fieldset class="form-group ">
                                        <input type="text" class="form-control" name="facebook_howto" value="{{ old('facebook_howto') ?? $setting->facebook_howto }}" id="facebook_howto" required>
                                    </fieldset>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <label for="upsell_howto">How to create Upsells video Link(Full embed link)</label>
                                    <fieldset class="form-group ">
                                        <input type="text" class="form-control" name="upsell_howto" value="{{ old('upsell_howto') ?? $setting->upsell_howto }}" id="upsell_howto" required>
                                    </fieldset>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <img class="dlogo" src="{{ asset($setting->logo) }}" alt="">
                                    <label for="logo">Replace Logo (57px by 37px preferred dimension)</label>
                                   
                                    <fieldset class="form-group ">
                                        <input type="file" class="form-control" name="logo" value="{{ old('logo') }}" id="logo">
                                    </fieldset>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <img class="dlogo" src="{{ asset($setting->favicon) }}" alt="">
                                    <label for="logo">Replace Favicon</label>
                                   
                                    <fieldset class="form-group ">
                                        <input type="file" class="form-control" name="favicon" value="{{ old('favicon') }}" id="favicon">
                                    </fieldset>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <img class="dlogo" src="{{ asset($setting->preloader) }}" alt="">
                                    <label for="logo">Replace preloader</label>
                                   
                                    <fieldset class="form-group ">
                                        <input type="file" class="form-control" name="preloader" value="{{ old('preloader') }}" id="preloader">
                                    </fieldset>
                                </div>
                               
                            </div>
                            <button class="btn btn-primary" style="width:100%; margin-top:10px" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        
</div>
@endsection
@endsection