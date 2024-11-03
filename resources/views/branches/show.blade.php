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
                        <h1>Detail Cabang</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $branch->name }}</h3>
                        <p><strong>Alamat:</strong> {{ $branch->address }}</p>
                        <p><strong>Telepon:</strong> {{ $branch->phone_number }}</p>
                        <p><strong>Email:</strong> {{ $branch->email }}</p>
                        <p><strong>Nomor Pajak:</strong> {{ $branch->tax_number }}</p>
                        <p><strong>VAT:</strong> {{ $branch->vat }}</p>
                        <p><strong>Perusahaan:</strong> {{ $branch->company->name }}</p>
                        <a href="{{ route('branch.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>
