@extends('layouts.main')

<div class="wrapper">
    @include('layouts.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Branch</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('branch.create') }}" class="btn btn-primary">Tambah Branch</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Branch</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>Nomor Pajak</th>
                                    <th>VAT</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $branch)
                                    <tr>
                                        <td>{{ $branch->name }}</td>
                                        <td>{{ $branch->address }}</td>
                                        <td>{{ $branch->phone_number }}</td>
                                        <td>{{ $branch->email }}</td>
                                        <td>{{ $branch->company->name }}</td>
                                        <td>{{ $branch->tax_number }}</td>
                                        <td>{{ $branch->vat }}</td>
                                        <td>
                                            <a href="{{ route('branch.edit', $branch->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('branch.destroy', $branch->id) }}" method="POST"
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
            </div>
        </section>
    </div>
</div>
