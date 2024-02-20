@extends('layout.main')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <h1 class="h2 mb-4">Customer</h1>
        <nav aria-label="breadcrumb p-4 my-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/customer/index" class="text-decoration-none">Customer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Overview</li>
            </ol>
        </nav>
    <div class="container">                
        <div class="row">
            <div class="col-16 mb-4 mb-lg-0">
                <h3>Customer Record</h3>
                <a href="/customer/create" class="btn btn-info btn-md"><i class="fa-solid fa-user-plus"></i> Add Member</a>
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
                    <div class="col-10">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th> 
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $customer->nameCustomer }}</td>
                                    <td>
                                        <a href="/customer/edit/{{ $customer->id }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square"></i></a>
                                        <a href="/customer/destroy/{{ $customer->id }}" class="btn btn-danger btn-sm" onclick="return confirm('sure?')"><i class="fa fa-trash"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteuser{{ $customer->id }}"><i class="fa fa-trash"></i></a>
                                        <!-- modal delete -->
                                        <div class="modal fade" id="deleteuser{{ $customer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Delete Data Customer</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6 align="center">Apakah anda yakin ingin menghapus Customer id <?php echo $customer['id']; ?><strong><span class="grt"></span></strong> ?</h4>                                                       
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button id="nodelete" type="button" class="btn btn-danger" data-dismiss="modal">Cancle</button>
                                                        <a href="/customer/destroy/{{ $customer->id }}" class="btn btn-primary">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
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
</main>    
@endsection