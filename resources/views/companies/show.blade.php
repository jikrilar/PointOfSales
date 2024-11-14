@extends('layouts.main')

<div class="wrapper">
    @include('layouts.sidebar')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Perusahaan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('company.index') }}"
                                    class="btn btn-secondary">Kembali</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $company->name }}</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Alamat:</strong> {{ $company->address }}</p>
                        <p><strong>Telepon:</strong> {{ $company->phone_number }}</p>
                        <p><strong>Email:</strong> {{ $company->email }}</p>
                        <p><strong>Bank:</strong> {{ $company->bank }}</p>
                        <p><strong>Nomor Akun:</strong> {{ $company->account_number }}</p>
                        <p><strong>Nama Akun:</strong> {{ $company->account_name }}</p>
                        <p><strong>Nomor Pajak:</strong> {{ $company->tax_number }}</p>
                        <p><strong>VAT:</strong> {{ $company->vat }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
