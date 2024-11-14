@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-4">
                            @if ($products->isEmpty())
                                <label for="product_code">Search Produk</label>
                                <div class="alert alert-warning">
                                    Tidak ada produk yang tersedia.
                                </div>
                            @else
                        </div>
                        <form action="{{ route('transaction.add') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="product_code">Search Produk<br><span
                                        class="text-secondary font-weight-normal">masukan kode
                                        produk atau select dari dropdown</span></label>
                                <input type="text" id="product_search" class="form-control"
                                    placeholder="Masukan Kode Produk" autocomplete="off">
                                <select name="product_code" id="product_code" class="form-control mt-2">
                                    <option value="" selected disabled>Select Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->code }}">{{ $product->name }} -
                                            {{ $product->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
