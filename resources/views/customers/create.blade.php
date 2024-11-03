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
                        <h1>Tambah Data Customer</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Data Umum</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">No Handphone</label>
                                        <input type="text" class="form-control" id="phone_number" placeholder="No Handphone" name="phone_number" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="birthday">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="birthday" name="birthday">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- right column -->
                        <div class="col-md-6">
                            <!-- Additional Information -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Informasi Tambahan</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="ktp_number">Nomor KTP</label>
                                        <input type="text" class="form-control" id="ktp_number" placeholder="Nomor KTP" name="ktp_number" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ktp_photo">Foto KTP</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="ktp_photo" name="ktp_photo">
                                                <label class="custom-file-label" for="ktp_photo">Upload Foto KTP</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Foto Customer</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photo" name="photo">
                                                <label class="custom-file-label" for="photo">Upload Foto Customer</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('customer.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>
