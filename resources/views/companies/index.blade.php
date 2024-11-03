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
                        <h1>Daftar Perusahaan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('company.create') }}"
                                    class="btn btn-primary">Tambah Perusahaan</a></li>
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
                        <h3 class="card-title">Data Perusahaan</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th>Bank</th>
                                    <th>Nomor Akun</th>
                                    <th>Nama Akun</th>
                                    <th>Nomor Pajak</th>
                                    <th>VAT</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->address }}</td>
                                        <td>{{ $company->phone_number }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->bank }}</td>
                                        <td>{{ $company->account_number }}</td>
                                        <td>{{ $company->account_name }}</td>
                                        <td>{{ $company->tax_number }}</td>
                                        <td>{{ $company->vat }}</td>
                                        <td>
                                            <a href="{{ route('company.edit', $company->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('company.destroy', $company->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>
