@extends('layouts.main')

<div class="wrapper">
    @include('layouts.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Barang yang Diterima</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('received.create') }}" class="btn btn-primary">Tambah Data Penerimaan</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Barang yang Diterima</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Transfer Order</th>
                                    <th>Produk</th>
                                    <th>Jumlah Diterima</th>
                                    <th>Tanggal Diterima</th>
                                    <th>Catatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($receivedItems as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->transferOrder->order_number }}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity_received }}</td>
                                        <td>{{ $item->received_date }}</td>
                                        <td>{{ $item->notes }}</td>
                                        <td>
                                            <a href="{{ route('received.show', $item->id) }}" class="btn btn-info">Detail</a>
                                            <a href="{{ route('received.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('received.destroy', $item->id) }}" method="POST" style="display:inline;">
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
            </div>
        </section>
    </div>
</div>
