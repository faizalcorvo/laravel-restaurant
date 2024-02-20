@extends('layout.main')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <h1 class="h2 mb-4">Create Record Order</h1>
        <nav aria-label="breadcrumb p-4 my-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/order/index" class="text-decoration-none">Order Record</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Record Order</li>
                <li class="breadcrumb-item active" aria-current="page">Overview</li>
            </ol>
        </nav>
        <div class="container">               
            <div class="row">
                <div class="col-16 mb-4 mb-lg-0">
                    <h3>Create New Record</h3>
                    <a href="/order/index" class="btn btn-danger btn-md my-3 fw-bold mb-3" title="black">
                        <span data-feather="chevron-left">Back</span>
                    </a>
                    <div class="row">
                        <div class="col-18">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <form action="/order/store" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Customer :</label>
                                            <select name="customerId" class="form-select">
                                                <option value=""></option>
                                                @foreach ($customer as $c)
                                                <option value="{{ $c->id }}">{{ $c->nameCustomer }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 menu-container">
                                            <label class="form-label">Menu</label>
                                            <button class="btn btn-info btn-sm btn-add-menu" type="button">Tambah Menu</button>
                                            <div class="input-group mb-1 menu">
                                                <select name="menuId[]" class="form-select">
                                                    <option></option>
                                                    @foreach ($menu as $m)
                                                    <option value="{{ $m->id }}">{{ $m->nameMenu }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="number" name="quantity[]" class="form-control" placeholder="Quantity" value="1">
                                                <a class="btn btn-secondary"></a>
                                            </div>
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-primary" type="submit">Submit</button>
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
<script>
	$('.btn-add-menu').click(function() {
		$('.menu-container').append(menu())
	})

	$(document).on('click', '.btn-delete-menu', function() {
		$(this).closest('.menu').remove()
	})

	function menu() {
		return `<div class="input-group mb-1 menu">
					<select name="menuId[]" class="form-select">
						<option></option>
						@foreach ($menu as $m)
							<option value="{{ $m->id }}">{{ $m->nameMenu }}</option>
						@endforeach
					</select>
					<input type="number" name="quantity[]" class="form-control" placeholder="Quantity" value="1">
					<a class="btn btn-danger btn-delete-menu"></a>
				<div>` 
	}
</script>
@endsection