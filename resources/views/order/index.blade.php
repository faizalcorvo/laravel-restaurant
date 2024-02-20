@extends('layout.main')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <h1 class="h2 mb-4">Order</h1>
        <nav aria-label="breadcrumb p-4 my-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/order/index" class="text-decoration-none">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Overview</li>
            </ol>
        </nav>
    <div class="container">                
        <div class="row">
            <div class="col-16 mb-4 mb-lg-0">
                <h3>Order Record</h3>
                <a href="/order/create" class="btn btn-info btn-md"><i class="fa-solid fa-cart-plus"></i> Add Order</a>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="fa fa-check"></i>
                    <strong>{{ session('success') }}</strong>
                </div>
                @endif
                <div class="row">
                    <div class="col-16 my-3">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Code</th> 
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->customer->nameCustomer }}</td>
                                    <td>{{ $data->code }}</td>
                                    <td>
                                        <a href="/order/show/{{ $data->id }}" class="btn btn-success btn-sm"><i class="fa fa-info-circle"></i></a>
                                        <a href="/order/edit/{{ $data->id }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square"></i></a>
                                        <a href="/order/destroy/{{ $data->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Sure?')"><i class="fa fa-trash"></i></a>
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
</main>    
@endsection