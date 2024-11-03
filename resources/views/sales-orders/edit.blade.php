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
                        <h1>Edit Sales Order</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('sales_orders.update', $salesOrder->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="customer_id">Customer</label>
                                <select name="customer_id" id="customer_id" class="form-control">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}"
                                            {{ $salesOrder->customer_id == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="order_date">Tanggal Order</label>
                                <input type="date" name="order_date" class="form-control"
                                    value="{{ $salesOrder->order_date }}" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="pending" {{ $salesOrder->status == 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="completed"
                                        {{ $salesOrder->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="products">Produk</label>
                                <select name="products[]" id="products" class="form-control" multiple>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ in_array($product->id, $salesOrder->products->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $product->name }} - {{ $product->price }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>
