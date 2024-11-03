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
                        <h1>Detail Customer</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('customer.destroy', $customer->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        <a href="{{ route('customer.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h2>{{ $customer->name }}</h2>
                            </div>
                            <div class="card-body">
                                <p><strong>Nomor KTP:</strong> {{ $customer->ktp_number }}</p>
                                <p><strong>Email:</strong> {{ $customer->email }}</p>
                                <p><strong>Nomor Telepon:</strong> {{ $customer->phone_number }}</p>
                                <p><strong>Tanggal Lahir:</strong>
                                    {{ \Carbon\Carbon::parse($customer->birthday)->format('d-m-Y') }}</p>

                                @if ($customer->ktp_photo)
                                    <p><strong>Foto KTP:</strong></p>
                                    <img src="{{ asset('storage/' . $customer->ktp_photo) }}"
                                        alt="KTP {{ $customer->name }}" style="max-width: 300px;">
                                @else
                                    <p><strong>Foto KTP:</strong> Tidak ada foto yang tersedia.</p>
                                @endif

                                @if ($customer->photo)
                                    <p><strong>Foto Pelanggan:</strong></p>
                                    <img src="{{ asset('storage/' . $customer->photo) }}"
                                        alt="Foto {{ $customer->name }}" style="max-width: 300px;">
                                @else
                                    <p><strong>Foto Pelanggan:</strong> Tidak ada foto yang tersedia.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>
