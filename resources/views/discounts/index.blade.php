@extends('layouts.main')

@section('content')
<div class="wrapper">
    @include('layouts.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Diskon</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('discounts.create') }}" class="btn btn-primary">Tambah Diskon</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Diskon</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Persentase Diskon</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($discounts as $discount)
                                <tr>
                                    <td>{{ $discount->name }}</td>
                                    <td>{{ $discount->description }}</td>
                                    <td>{{ $discount->discount_percent }}%</td>
                                    <td>{{ $discount->start_date }}</td>
                                    <td>{{ $discount->end_date }}</td>
                                    <td>
                                        <a href="{{ route('discounts.show', $discount->id) }}" class="btn btn-info">Lihat</a>
                                        <a href="{{ route('discounts.edit', $discount->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST" style="display:inline;">
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
@endsection
