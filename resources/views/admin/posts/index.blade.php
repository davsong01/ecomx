@extends('layouts.dashboard')
@section('title', 'Posts')
@section('active')
<li class="breadcrumb-item">Post Entries</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                            <a class="nav-link active" href="{{ route('posts.index') }}">All Posts</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.trashed') }}">Trashed Posts</a>
                            </li>
                        </ul>

                        @include('includes.alerts')
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Author</th>
                                            <th>Type</th>
                                            <th>Title</th>
                                            <th>Value</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $post)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                 @if($post->status == 1)<i class="bx bxs-circle success font-small-1 mr-50" data-toggle="tooltip" title="Approved"></i>@else
                                                 <i class="bx bxs-circle danger font-small-1 mr-50" data-toggle="tooltip" title="Not Approved"></i>@endif
                                            </td>
                                            <td>{{ $post->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $post->user->username }}</td>
                                            <td>{{ $post->type }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{!! $setting->default_currency !!}{{ $post->value }}</td>
                                            <td>
                                                <a class="actions" data-toggle="tooltip" title="View/Edit Post" href="{{ route('posts.edit', $post->id) }}"> <i class="bx bxs-edit actions"></i></
                                                </a>
                                                @if($post->status == 0)
                                                <a class="actions" data-toggle="tooltip" title="Approve Post" href="{{ route('posts.approve', $post->id) }}" onclick="return confirm('Are you sure you have checked this post and you are ready to approve?');"> <i class="fa fa-check actions"></i></
                                                </a>
                                                @endif
                                                @if($post->status == 1)
                                                <a class="actions" data-toggle="tooltip" title="UnApprove Post" href="{{ route('posts.unapprove', $post->id) }}" onclick="return confirm('Caution! Do you really want to Unapprove?');"> <i class="bx bx-block"></i></
                                                </a>
                                                @endif
                                                <a class="actions" data-toggle="tooltip" onclick="return confirm('Are you really sure?');" title="Trash Post" href="{{ route('posts.delete', $post->id) }}"> <i class="fa fa-recycle"></i></
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->         
</div>
@endsection