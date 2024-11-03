@extends('layouts.main')

<div class="wrapper">
    @include('layouts.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Branch</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('branch.update', $branch->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ $branch->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" name="address" class="form-control" id="address"
                                    value="{{ $branch->address }}" required>
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Telepon</label>
                                <input type="text" name="phone_number" class="form-control" id="phone_number"
                                    value="{{ $branch->phone_number }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ $branch->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="company_id">Company</label>
                                <select name="company_id" class="form-control" id="company_id" required>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}"
                                            @if ($company->id == $branch->company_id) selected @endif>
                                            {{ $company->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tax_number">Nomor Pajak</label>
                                <input type="text" name="tax_number" class="form-control" id="tax_number"
                                    value="{{ $branch->tax_number }}" required>
                            </div>

                            <div class="form-group">
                                <label for="vat">VAT</label>
                                <input type="text" name="vat" class="form-control" id="vat"
                                    value="{{ $branch->vat }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
