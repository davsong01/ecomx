@extends('layouts.admindashboard')
@section('title', 'Upsells')
@section('active')
<li class="breadcrumb-item">Upsells</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Upsells</h4>
                        <a href="{{ route('upsells.create') }}" class="btn btn-primary mt-1">Add new</a>
                        @include('inc.alerts')
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Video Link</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($upsells as $upsell)
                                        <tr> 
                                            <td>{{ $upsell->name }}</td>
                                            <td>{{ $upsell->price }}</td>
                                            <td>{{ $upsell->video_link }}</td>
                                            <td>{{ ($upsell->status == 1) ? 'Published' : 'Draft' }}</td>
                                            
                                            <td style="padding-left: 5px;padding-right: 5px; ">
                                                <div class="button-group">
                                                    <a class="actions" data-toggle="tooltip" title="View/Edit upsell" href="{{ route('upsells.edit', $upsell->id) }}"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="bx bxs-edit"></i></
                                                    </a>
                                                </div>
                                                <div class="button-group">
                                                    <form id="delete" style="float: left;" onsubmit="return confirm('Are you sure you want to delete forever?');" action="{{ route('upsells.destroy', $upsell->id) }}" method="POST" >
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