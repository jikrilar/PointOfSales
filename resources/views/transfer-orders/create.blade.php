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
                        <h1>Tambah Transfer Order</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('transfer-order.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="from_branch_id">Dari Cabang</label>
                                <select name="from_branch_id" id="from_branch_id" class="form-control">
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="to_branch_id">Ke Cabang</label>
                                <select name="to_branch_id" id="to_branch_id" class="form-control">
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="transfer_date">Tanggal Transfer</label>
                                <input type="date" name="transfer_date" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="pending">Pending</option>
                                    <option value="completed">Completed</option>
                                </select>
                            </div>

                            <!-- Input for products and quantities -->
                            <div class="form-group">
                                <label for="product_id">Produk</label>
                                <select name="product_id" id="product_id" class="form-control">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Pilih produk untuk
                                    ditransfer.</small>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Jumlah Produk</label>
                                <input type="number" name="quantity[]" class="form-control" min="1"
                                    placeholder="Masukkan jumlah produk" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>
