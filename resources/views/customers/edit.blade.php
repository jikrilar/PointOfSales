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
                        <h1>Edit Customer</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('customer.index') }}"
                                    class="btn btn-primary">Kembali ke Daftar Customer</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Customer</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer.update', $customer->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $customer->name) }}" required>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="ktp_number">No KTP</label>
                                <input type="text" class="form-control @error('ktp_number') is-invalid @enderror"
                                    id="ktp_number" name="ktp_number"
                                    value="{{ old('ktp_number', $customer->ktp_number) }}" required>
                                @error('ktp_number')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="ktp_photo">Foto KTP</label>
                                <input type="file" class="form-control @error('ktp_photo') is-invalid @enderror"
                                    id="ktp_photo" name="ktp_photo">
                                @error('ktp_photo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                @if ($customer->ktp_photo)
                                    <img src="{{ asset('storage/' . $customer->ktp_photo) }}" alt="KTP"
                                        class="mt-2" style="max-width: 150px;">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="photo">Foto Customer</label>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                    id="photo" name="photo">
                                @error('photo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                @if ($customer->photo)
                                    <img src="{{ asset('storage/' . $customer->photo) }}" alt="Customer" class="mt-2"
                                        style="max-width: 150px;">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $customer->email) }}"
                                    required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone_number">No Handphone</label>
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                    id="phone_number" name="phone_number"
                                    value="{{ old('phone_number', $customer->phone_number) }}" required>
                                @error('phone_number')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="birthday">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('birthday') is-invalid @enderror"
                                    id="birthday" name="birthday" value="{{ old('birthday', $customer->birthday) }}"
                                    required>
                                @error('birthday')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>
