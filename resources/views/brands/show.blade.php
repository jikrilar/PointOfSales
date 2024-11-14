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
                        <h1>Detail Brand</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $brand->name }}</h3>
                        <p>{{ $brand->description }}</p>
                        <p><strong>Website:</strong> <a href="{{ $brand->website_url }}"
                                target="_blank">{{ $brand->website_url }}</a></p>
                        <p><strong>Logo:</strong> <img src="{{ asset('logos/' . $brand->logo) }}"
                                alt="{{ $brand->name }}" width="100"></p>
                        <a href="{{ route('brand.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>
