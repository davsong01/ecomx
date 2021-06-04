@extends('layouts.admindashboard')
@section('title', 'Suggested Products')
@section('active')
<li class="breadcrumb-item">Suggested products</li>
@endsection
@section('content')
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Suggested products</h4>
                        @include('inc.alerts')
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Date Uploaded</th>
                                            <th>Subscriber</th>
                                            <th>Product Name</th>
                                            <th>Thumbnail</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($suggestions as $suggestion)
                                        <tr> 
                                            <td>{{ $suggestion->created_at }}</td>
                                            <td>{{ isset($suggestion->user) ? $suggestion->user->name :'Subscriber deleted' }} </td>
                                            <td>{{ isset($suggestion->user) ? $suggestion->user->name :'Subscriber deleted' }} </td>
                                            <td>{{ $suggestion->name }}</td>
                                           <td> <img src="{{ route('suggestion.file', $suggestion->image ) }}" alt="Suggestion image" style="height: 50px;
                                            width: auto;">
                                           </td>
                                            
                                            <td style="padding-left: 5px;padding-right: 5px; ">
                                                <div class="button-group">
                                                    <a class="actions" data-toggle="tooltip" title="View suggested product image" href="{{ route('suggestion.edit', $suggestion->id) }}"> <i style="padding: 9px;
                                                        border: 1px solid;
                                                        border-radius: 4px !important;" class="fa fa-eye"></i></
                                                    </a>
                                                </div>
                                                <div class="button-group">
                                                    <form id="delete" style="float: left;" onsubmit="return confirm('Are you sure you want to delete forever?');" action="{{ route('suggestion.destroy', $suggestion->id) }}" method="POST" >
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