@extends('layout.main')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <h1 class="h2 mb-4">Edit Record Order</h1>
        <nav aria-label="breadcrumb p-4 my-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/order/index" class="text-decoration-none">Order Record</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Record Order</li>
                <li class="breadcrumb-item active" aria-current="page">Overview</li>
            </ol>
        </nav>
        <div class="container">                
            <div class="row">
                <div class="col-16 mb-4 mb-lg-0">
                    <h3>Edit Record</h3>
                    <a href="/order/index" class="btn btn-danger btn-md mb-3" title="black">Back</a>
                    <div class="row">
                        <div class="col-18">
                            <div class="card">
                                <div class="card-body">
                                    {{-- <form action="{{ route('customer.update', $customer->id) }}" method="post"> --}}
                                    <form action="/order/update/{{ $order->id }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="customerId" class="form-label">Customer:</label>
                                            <select name="customerId" id="customerId" class="form-select">
                                                @foreach ($customer as $c)
                                                @if ($order->customerId == $c->id)
                                                    <option value="{{ $c->id }}" selected>{{ $c->nameCustomer }}</option>
                                                @else
                                                    <option value="{{ $c->id }}">{{ $c->nameCustomer }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 menu-container">
                                            <label class="form-label">Menu : </label>
                                            <button class="btn btn-info btn-sm btn-add-menu" type="button">Tambah Menu</button>
                                            @foreach ($order->orderItem as $key => $orderItem)
                                                <div class="input-group mb-1 menu">
                                                    <select class="form-control" name="menuId[]">
                                                        <option></option>
                                                        @foreach ($menu as $m)
                                                            @if ($orderItem->menuId == $m->id)
                                                                <option value="{{ $m->id }}" selected>{{ $m->nameMenu }}</option>
                                                            @else
                                                                <option value="{{ $m->id }}">{{ $m->nameMenu }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <input type="number" class="form-control" name="quantity[]" placeholder="Quantity" value="{{ $orderItem->quantity }}">
                                                    @if ($key == 0)
                                                        <a class="btn btn-secondary"></a>
                                                    @else
                                                        <a class="btn btn-danger btn-delete-menu"></a>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-primary rounded">Update</button>
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