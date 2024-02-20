@extends('layout.main')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <h1 class="h2 mb-4">Create Record Customer</h1>
        <nav aria-label="breadcrumb p-4 my-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/customer/index" class="text-decoration-none">Customer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Record Customer</li>
                <li class="breadcrumb-item active" aria-current="page">Overview</li>
            </ol>
        </nav> 
        <div class="container">               
            <div class="row">
                <div class="col-16 mb-4 mb-lg-0">
                    <h3>Create New Record</h3>
                    <a href="/customer/index" class="btn btn-danger btn-md mb-3" title="black">Back</a>
                    <div class="row">
                        <div class="col-18">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <form action="/customer/store" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name :</label>
                                            <input type="text" name="nameCustomer" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email :</label>
                                            <input type="text" name="emailCustomer" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone :</label>
                                            <input type="text" name="phoneCustomer" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="member" class="form-label">Member :</label>
                                            <input type="checkbox" name="member" value="1" class="form-check-input">
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-primary">Create</button>
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