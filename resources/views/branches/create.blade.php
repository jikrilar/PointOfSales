@extends('layouts.main')

<div class="wrapper">
    @include('layouts.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Branch</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('branch.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" name="address" class="form-control" id="address" required>
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Telepon</label>
                                <input type="text" name="phone_number" class="form-control" id="phone_number"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>

                            <div class="form-group">
                                <label for="company_id">Company</label>
                                <select name="company_id" class="form-control" id="company_id" required>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tax_number">Nomor Pajak</label>
                                <input type="text" name="tax_number" class="form-control" id="tax_number" required>
                            </div>

                            <div class="form-group">
                                <label for="vat">VAT</label>
                                <input type="text" name="vat" class="form-control" id="vat" required>
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
