@extends('layouts.admindashboard')
@section('title', 'Products')
@section('active')
<li class="breadcrumb-item">Products</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All products</h4>
                        <a href="{{ route('products.create') }}" class="btn btn-primary p-1">Add new</a>
                        @include('inc.alerts')
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>In Stock</th>
                                            <th>Category(s)</th>
                                            <th>No of products</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr> 
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>
                                                @foreach($product->category as $category)
                                                {{ $category->title }} | <br>
                                                @endforeach
                                            </td>
                                            <td>{{ $product->product_products_count }}</td>
                                            <td>{{ ($product->status == 1) ? 'Published' : 'Draft' }}</td>
                                            
                                            <td style="padding-left: 5px;padding-right: 5px; ">
                                                <div class="button-group">
                                                    <a class="actions" data-toggle="tooltip" title="View/Edit product" href="{{ route('products.edit', $product->id) }}"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="bx bxs-edit"></i></
                                                    </a>
                                                </div>
                                                <div class="button-group">
                                                    <form id="delete" style="float: left;" onsubmit="return confirm('Are you sure you want to delete forever?');" action="{{ route('products.destroy', $product->id) }}" method="POST" >
                                                        @csrf
                                                        @method('DELETE') 
                                                        <button class="form-control delete-button" type="submit"><i class="fa fa-trash" style="color: #950026;"></i></button>
                                                    </form>  
                                                </div>
                                                <div class="button-group">
                                                    <a class="actions" data-toggle="tooltip" title="Resend product email" href="{{ route('products.resend', $product->id) }}"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="ficon bx bx-envelope"></i></
                                                    </a>
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