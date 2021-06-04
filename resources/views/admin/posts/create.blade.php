@extends('layouts.dashboard')
@section('item')
<a href="{{ route('users.index') }}">Users</a>
@endsection
@section('active')
<li class="breadcrumb-item active">Create User</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Basic Inputs start -->
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        @if($post->status == 0)
                        <li class="nav-item">
                        <a class="nav-link active" onclick="return confirm('Are you sure you have checked this post and you are ready to approve?');" href="{{ route('posts.approve', $post->id) }}">Approve Post</a>
                        </li>
                        @endif
                        @if($post->status == 1)
                        <li class="nav-item">
                        <a class="nav-link active" onclick="return confirm('Are you sure you have checked this post and you are ready to unapprove?');" href="{{ route('posts.index') }}">Un Approve Post</a>
                        </li>
                        @endif
                        <li class="nav-item">
                        <a class="nav-link" href="#"><b>Status:</b> {{ $post->status == 0 ? 'Pending' : 'Approved' }}</a>
                        </li>
                    </ul>

                        @include('includes.alerts')
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="type">Post Type: {{ $post->type }}</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="type">Writer: {{ $post->user->username }}</label>
                                </fieldset>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <fieldset class="form-group">
                                    <label for="type">Writer's Phone: {{ $post->user->phone }}</label>
                                </fieldset>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="text" style="color:red">Content </label>
                                    <textarea id="textckeditor" required="required" type="text" class="form-control" name="text" value="{{ $post->content }}" rows="8" autofocus>{!! $post->content !!}</textarea>
                                </div>
                            </div>
                        </div>

                        @if(isset($post->images) && $post->images != 'null')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="text" style="color:red">Post Images</label>
                                </div>
                            </div>
                            @foreach(json_decode($post->images) as $image)
                            <div class="col-md-4 col-sm-12">
                            <img src="{{route('get.file', $image) }}" alt="{!! $image !!}" style="width: 100%; height: 250px;">
                            <div> <a href="{{route('get.file', $image) }}"><p style="text-align:center"><b>Download</b></p></a> </div>
                            </div>                        
                            @endforeach                                  
                        </div>
                        @endif

                        @if(isset($post->videos))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="text" style="color:red">Post Videos</label>
                                </div>
                            </div>
                            @foreach(json_decode($post->videos) as $video)
                            <div class="col-md-6 col-sm-12">
                                <video width="100%" controls>
                                <source src="{{route('get.file', $video) }}">
                                Your browser does not support HTML video.
                                </video>
                            <img src="" alt="{!! $video !!}" style="width: 100%; height: 250px;">
                            <div> <a href="{{route('get.file', $video) }}"><p style="text-align:center"><b>Download</b></p></a> </div>
                            </div>                        
                            @endforeach                                  
                        </div>
                        @endif
                    </div>
                </div>

                <div class="card-header">
                    <ul class="nav nav-tabs">
                        @if($post->status == 0)
                        <li class="nav-item">
                        <a class="nav-link active" onclick="return confirm('Are you sure you have checked this post and you are ready to approve?');" href="{{ route('posts.approve', $post->id) }}">Approve Post</a>
                        </li>
                        @endif
                        @if($post->status == 1)
                        <li class="nav-item">
                        <a class="nav-link active" onclick="return confirm('Are you sure you have checked this post and you are ready to unapprove?');" href="{{ route('posts.index') }}">Un Approve Post</a>
                        </li>
                        @endif
                        <li class="nav-item">
                        <a class="nav-link" href="#"><b>Status:</b> {{ $post->status == 0 ? 'Pending' : 'Approved' }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic Inputs end -->
<scrip src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></scrip>
<script>
    CKEDITOR.replace('textckeditor');
    CKEDITOR.replace('imagesckeditor');
    CKEDITOR.replace('videosckeditor'); 
</script>

@endsection