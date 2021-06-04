@extends('layouts.admindashboard')
@section('title', 'Ambassadors')
@section('active')
<li class="breadcrumb-item">Ambassadors</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Ambassadors</h4>
                        <a href="{{ route('ambassadors.create') }}" class="btn btn-primary p-1">Add new abassador</a>
                        @include('inc.alerts')
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Date Uploaded</th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            {{-- <th><i class="fa fa-linkedin"></i></th>
                                            <th><i class="fa fa-twitter"></i></th>
                                            <th><i class="fa fa-facebook"></i></th> --}}
                                            <th>Thumbnail</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ambassadors as $a)
                                        <tr> 
                                            <td>{{ $a->created_at }}</td>
                                            <td>{{ $a->name }}</td>
                                            <td>{{ $a->title }}</td>
                                            {{-- <td>{{ $a->linkedin_link }}</td>
                                            <td>{{ $a->twitter_link }}</td>
                                            <td>{{ $a->facebook_link }}</td> --}}
                                            <td>{{ ($a->status == 1) ? 'Published' : 'Draft' }}</td>
                                            
                                            <td> <img src="{{ asset($a->image ) }}" alt="image" style="height: 50px;
                                            width: auto;"></td>
                                            
                                            <td style="padding-left: 5px;padding-right: 5px; ">
                                                <div class="button-group">
                                                    <a class="actions" data-toggle="tooltip" title="View/edit ambassador" href="{{ route('ambassadors.edit', $a->id) }}"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="bx bxs-edit"></i></
                                                    </a>
                                                </div>
                                                <div class="button-group">
                                                    <form id="delete" style="float: left;" onsubmit="return confirm('Are you sure you want to delete forever?');" action="{{ route('ambassadors.destroy', $a->id) }}" method="POST" >
                                                        @csrf
                                                        @method('DELETE') 
                                                        <button class="form-control deletebutton" type="submit"><i class="fa fa-trash" style="color: #950026;"></i></button>
                                                    </form>  
                                                </div>
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