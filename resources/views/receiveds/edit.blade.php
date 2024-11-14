@extends('layouts.main')

<div class="wrapper">
    @include('layouts.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Data Penerimaan Barang</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('received.update', $receivedItem->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="transfer_order_id">Transfer Order</label>
                                <select name="transfer_order_id" class="form-control">
                                    @foreach ($transferOrders as $order)
                                        <option value="{{ $order->id }}"
                                            {{ $order->id == $receivedItem->transfer_order_id ? 'selected' : '' }}>
                                            {{ $order->order_number }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product_id">Produk</label>
                                <select name="product_id" class="form-control">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ $product->id == $receivedItem->product_id ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="quantity_received">Jumlah Diterima</label>
                                <input type="number" name="quantity_received" class="form-control"
                                    value="{{ $receivedItem->quantity_received }}">
                            </div>

                            <div class="form-group">
                                <label for="received_date">Tanggal Diterima</label>
                                <input type="date" name="received_date" class="form-control"
                                    value="{{ $receivedItem->received_date }}">
                            </div>

                            <div class="form-group">
                                <label for="notes">Catatan</label>
                                <textarea name="notes" class="form-control">{{ $receivedItem->notes }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
