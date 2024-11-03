@extends('layouts.main')

@section('content')
    <div class="wrapper">
        @include('layouts.sidebar')

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Detail Diskon</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $discount->name }}</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Deskripsi:</strong> {{ $discount->description }}</p>
                            <p><strong>Persentase Diskon:</strong> {{ $discount->discount_percent }}%</p>
                            <p><strong>Tanggal Mulai:</strong> {{ $discount->start_date }}</p>
                            <p><strong>Tanggal Selesai:</strong> {{ $discount->end_date }}</p>

                            <h5>Produk Terkait:</h5>
                            <ul>
                                @foreach ($discount->products as $product)
                                    <li>{{ $product->name }} (Harga: {{ $product->price }})</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
