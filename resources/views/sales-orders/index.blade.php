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
                        <h1>Daftar Sales Order</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('sales_orders.create') }}" class="btn btn-primary">Tambah Sales
                                    Order</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Sales Order</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor Sales Order</th>
                                    <th>Nama Customer</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salesOrders as $salesOrder)
                                    <tr>
                                        <td>{{ $salesOrder->order_number }}</td>
                                        <td>{{ $salesOrder->customer->name }}</td>
                                        <td>{{ $salesOrder->order_date }}</td>
                                        <td>{{ $salesOrder->status }}</td>
                                        <td>{{ $salesOrder->total_amount }}</td>
                                        <td>
                                            <a href="{{ route('sales_orders.show', $salesOrder->id) }}"
                                                class="btn btn-info">Lihat</a>
                                            <a href="{{ route('sales_orders.edit', $salesOrder->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('sales_orders.destroy', $salesOrder->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>
