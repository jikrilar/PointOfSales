@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Kasir</h1>

        <div class="card">
            <div class="card-header">
                <h2>{{ $cashier->name }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $cashier->email }}</p>
                <p><strong>Nomor Telepon:</strong> {{ $cashier->phone_number }}</p>
                <p><strong>Cabang:</strong> {{ $cashier->branch->name ?? 'Tidak ada' }}</p>
                <!-- Assuming there's a relationship defined -->

                <a href="{{ route('cashiers.edit', $cashier->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('cashiers.destroy', $cashier->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
                <a href="{{ route('cashiers.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
@endsection
