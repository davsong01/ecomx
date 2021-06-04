@extends('layouts.admindashboard')
@section('title', 'Category')
@section('active')
<li class="breadcrumb-item">Categories</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All categories</h4>
                        <a href="{{ route('category.create') }}" class="btn btn-primary mt-1">Add new</a>
                        @include('inc.alerts')
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>No of Products</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                        <tr> 
                                            <td>{{ $category->title }}</td>
                                            <td>{{ $category->products_count }}</td>
                                            <td>{{ $category->status == 0 ?'Draft' : 'Published' }}</td>
                                           
                                            <td style="padding-left: 5px;padding-right: 5px;">
                                           
                                            <div class="button-group">
                                                <a class="actions" data-toggle="tooltip" title="View/Edit category" href="{{ route('category.edit', $category->id) }}"> <i style="padding: 9px;
                                                    border: 1px solid;
                                                    border-radius: 4px !important;" class="bx bxs-edit"></i></
                                                </a>
                                            </div>
                                            <div class="button-group">
                                                <form id="delete" style="float: left;" onsubmit="return confirm('Are you sure you want to delete forever?');" action="{{ route('category.destroy', $category->id) }}" method="POST" >
                                                    @csrf
                                                    @method('DELETE') 
                                                    <button class="form-control deletebutton" type="submit"><i class="fa fa-trash" style="color: #950026;"></i></button>
                                                </form>  
                                            </div>
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