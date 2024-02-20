@extends('layout.main')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <h1 class="h2 mb-4">Detailed Order</h1>
        <nav aria-label="breadcrumb p-4 my-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/order/index" class="text-decoration-none">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detailed Order</li>
            </ol>
        </nav>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <img src="/storage/images/logo.png" class="img-fluid" width="90" heigth="90"> Restaurant, Inc.
                                        <small class="float-right">Date: <?= date('d/m/Y'); ?></small>
                                    </h4>
                                </div>
                            </div>
                            <!-- info row -->
                            <div class="row">
                                <div class="col-sm-4 invoice-col">
                                    <b>Customer : 
                                        {{ $order->customer->nameCustomer }} 
                                        {{ $order->customer->member ? '(Member)' : ''}}
                                    </b>
                                    <br>
                                    <b>Order Code:</b> {{ $order->code }}<br>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-lg-16">
                                    <p class="text-muted well well-sm shadow-none card-header" style="margin-top: 10px;">
                                        Order Detailed
                                    </p>
                                    @foreach ($order->orderItem as $orderItem)
                                    <div class="d-flex justify-content-between fst-italic card-body">
                                        <small>{{ $orderItem->menu->nameMenu }}</small>
                                        <small>{{ $orderItem->quantity }}</small>
                                        <small>Rp.{{ number_format($orderItem->subTotal,2,',','.') }}</small>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-12 float-right">
                                    <div class="table-responsive">
                                        <table class="table">
                                            @if ($order->customer->member)
                                            <tr>
                                                <th>Discount Member</th>
                                                <td class="d-flex justify-content-end">10%</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <th>Total:</th>
                                                <td class="d-flex justify-content-end">Rp.{{ number_format($order->total,2,',','.') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="/order/index" class="btn btn-danger float-right">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main> 
    <!-- /.content -->
        {{-- <div class="container">                
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <p class="m-0">Customer: </p>
                                <small class="fst-italic">
                                    {{ $order->customer->nameCustomer }}
                                    {{ $order->customer->member ? '(Member)' : ''}}
                                </small>
                            </div>
                            <div class="mb-3">
                                <p class="m-0">Code :</p>
                                <small class="fst-italic">
                                    {{ $order->code }}
                                </small>
                            </div>
                            <div class="mb-3">
                                <p class="m-0">Detail Order :</p>
                                @foreach ($order->orderItem as $orderItem)
                                    <div class="d-flex justify-content-between fst-italic">
                                        <small>{{ $orderItem->menu->nameMenu }}</small>
                                        <small>{{ $orderItem->quantity }}</small>
                                        <small>{{ $orderItem->subTotal }}</small>
                                    </div>
                                @endforeach

                                @if ($order->customer->member)
                                    <div class="text-end fst-italic">
                                        <small class="me-3">Discount Member : </small>
                                        <small class="border-top border-dark">10 %</small>
                                    </div>
                                @endif

                                <div class="text-end fst-italic">
                                    <small class="me-3">Total : </small>
                                    <small class="border-top border-dark">{{ $order->total }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
   
@endsection