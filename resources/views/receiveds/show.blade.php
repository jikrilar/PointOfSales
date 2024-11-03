@extends('layouts.main')

<div class="wrapper">
    @include('layouts.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Penerimaan Barang</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Transfer Order</th>
                                <td>{{ $receivedItem->transferOrder->order_number }}</td>
                            </tr>
                            <tr>
                                <th>Produk</th>
                                <td>{{ $receivedItem->product->name }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Diterima</th>
                                <td>{{ $receivedItem->quantity_received }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Diterima</th>
                                <td>{{ $receivedItem->received_date }}</td>
                            </tr>
                            <tr>
                                <th>Catatan</th>
                                <td>{{ $receivedItem->notes }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('received.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
