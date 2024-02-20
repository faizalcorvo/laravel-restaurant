@extends('layout.main')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <h1 class="h2 mb-4">Edit Record Customer</h1>
        <nav aria-label="breadcrumb p-4 my-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/customer/index" class="text-decoration-none">Customer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Record Customer</li>
                <li class="breadcrumb-item active" aria-current="page">Overview</li>
            </ol>
        </nav> 
        <div class="container">                
            <div class="row">
                <div class="col-16 mb-4 mb-lg-0">
                    <h3>Edit Record</h3>
                    <a href="/customer/index" class="btn btn-danger btn-md mb-3" title="black">Back</a>
                    <div class="row">
                        <div class="col-18">
                            <div class="card bg-light">
                                <div class="card-body">
                                    {{-- <form action="{{ route('customer.update', $customer->id) }}" method="post"> --}}
                                    <form action="/customer/update/{{ $customer->id }}" method="post">
                                        @csrf
                                        {{-- @method('PUT') --}}
                                        <div class="mb-3">
                                            <label for="name" class="mb-3" id="basic-addon1" class="form-label">Name :</label>
                                            <input type="text" name="nameCustomer" class="form-control" value="{{ $customer->nameCustomer }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="mb-3" id="basic-addon1" class="form-label">Email :</label>
                                            <input type="text" name="emailCustomer" class="form-control" value="{{ $customer->emailCustomer }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="mb-3" id="basic-addon1" class="form-label">Phone :</label>
                                            <input type="text" name="phoneCustomer" class="form-control" value="{{ $customer->phoneCustomer }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="member" class="mb-3" class="form-label">Member :</label>
                                            <input type="checkbox" name="member" class="form-check-input" {{ $customer->member ? 'checked' : '' }}>
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
@endsection