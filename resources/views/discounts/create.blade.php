@extends('layouts.main')

@section('content')
    <div class="wrapper">
        @include('layouts.sidebar')

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tambah Diskon Baru</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Diskon</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('discounts.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Diskon</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="discount_percent">Persentase Diskon (%)</label>
                                    <input type="number" name="discount_percent" class="form-control" required
                                        min="0" max="100">
                                </div>
                                <div class="form-group">
                                    <label for="start_date">Tanggal Mulai</label>
                                    <input type="date" name="start_date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="end_date">Tanggal Selesai</label>
                                    <input type="date" name="end_date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="products">Produk Terkait</label>
                                    <select name="products[]" class="form-control" multiple required>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }} (Harga:
                                                {{ $product->price }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
