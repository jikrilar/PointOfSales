@extends('layouts.main')

<div class="wrapper">
    @include('layouts.sidebar')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Vendor</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('vendor.index') }}"
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
                        <h3 class="card-title">Form Edit Vendor</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vendor.update', $vendor->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama Vendor</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $vendor->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $vendor->address }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Telepon</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="{{ $vendor->phone_number }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $vendor->email }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
