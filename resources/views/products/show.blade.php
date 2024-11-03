@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Produk</h1>

        <div class="card">
            <div class="card-header">
                <h2>{{ $product->name }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Deskripsi:</strong> {{ $product->description }}</p>
                <p><strong>Harga:</strong> Rp {{ number_format($product->price, 2, ',', '.') }}</p>
                <p><strong>Brand:</strong> {{ $product->brand->name ?? 'Tidak ada' }}</p>
                <!-- Assuming there's a relationship defined -->
                <p><strong>Departemen:</strong> {{ $product->department->name ?? 'Tidak ada' }}</p>
                <!-- Assuming there's a relationship defined -->
                <p><strong>Kelas:</strong> {{ $product->class->name ?? 'Tidak ada' }}</p>
                <!-- Assuming there's a relationship defined -->
                <p><strong>Subclass:</strong> {{ $product->subclass->name ?? 'Tidak ada' }}</p>
                <!-- Assuming there's a relationship defined -->

                @if ($product->image)
                    <p><strong>Gambar:</strong></p>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 300px;">
                @else
                    <p><strong>Gambar:</strong> Tidak ada gambar yang tersedia.</p>
                @endif

                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
@endsection
