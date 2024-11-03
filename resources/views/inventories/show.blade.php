@extends('layouts.main')

<div class="wrapper">
    @include('layouts.sidebar')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Inventaris</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('inventory.index') }}"
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
                        <h3 class="card-title">Detail Data Inventaris</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Produk:</strong> {{ $inventory->product->name }}</p>
                        <p><strong>Kuantitas:</strong> {{ $inventory->quantity }}</p>
                        <p><strong>Lokasi:</strong> {{ $inventory->location }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
