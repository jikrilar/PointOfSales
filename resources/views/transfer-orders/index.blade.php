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
                        <h1>Daftar Transfer Order</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('transfer-order.create') }}" class="btn btn-primary">Tambah Transfer
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
                        <h3 class="card-title">Data Transfer Order</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor Transfer</th>
                                    <th>Dari Cabang</th>
                                    <th>Ke Cabang</th>
                                    <th>Tanggal Transfer</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transferOrders as $transferOrder)
                                    <tr>
                                        <td>{{ $transferOrder->transfer_number }}</td>
                                        <td>{{ $transferOrder->fromBranch->name }}</td>
                                        <td>{{ $transferOrder->toBranch->name }}</td>
                                        <td>{{ $transferOrder->transfer_date }}</td>
                                        <td>{{ $transferOrder->status }}</td>
                                        <td>
                                            <a href="{{ route('transfer-order.show', $transferOrder->id) }}"
                                                class="btn btn-info">Lihat</a>
                                            <a href="{{ route('transfer-order.edit', $transferOrder->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('transfer-order.destroy', $transferOrder->id) }}"
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
