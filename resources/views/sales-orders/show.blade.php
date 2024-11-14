@extends('layouts.main')

<div class="wrapper">
    @include('layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Sales Order</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nomor Order</th>
                                <td>{{ $salesOrder->order_number }}</td>
                            </tr>
                            <tr>
                                <th>Nama Customer</th>
                                <td>{{ $salesOrder->customer->name }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Order</th>
                                <td>{{ $salesOrder->order_date }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $salesOrder->status }}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>{{ $salesOrder->total_amount }}</td>
                            </tr>
                            <tr>
                                <th>Produk</th>
                                <td>
                                    <ul>
                                        @foreach ($salesOrder->products as $product)
                                            <li>{{ $product->name }} - {{ $product->pivot->quantity }} pcs</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        </table>

                        <a href="{{ route('sales_orders.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>
