@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Perusahaan</h1>
        <form action="{{ route('company.update', $company->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $company->name) }}" required>
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" required>{{ old('address', $company->address) }}</textarea>
                @error('address')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone_number">Telepon</label>
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                    name="phone_number" value="{{ old('phone_number', $company->phone_number) }}" required>
                @error('phone_number')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email', $company->email) }}" required>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="bank">Bank</label>
                <input type="text" class="form-control @error('bank') is-invalid @enderror" id="bank" name="bank"
                    value="{{ old('bank', $company->bank) }}" required>
                @error('bank')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="account_number">Nomor Akun</label>
                <input type="text" class="form-control @error('account_number') is-invalid @enderror" id="account_number"
                    name="account_number" value="{{ old('account_number', $company->account_number) }}" required>
                @error('account_number')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="account_name">Nama Akun</label>
                <input type="text" class="form-control @error('account_name') is-invalid @enderror" id="account_name"
                    name="account_name" value="{{ old('account_name', $company->account_name) }}" required>
                @error('account_name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tax_number">Nomor Pajak</label>
                <input type="text" class="form-control @error('tax_number') is-invalid @enderror" id="tax_number"
                    name="tax_number" value="{{ old('tax_number', $company->tax_number) }}" required>
                @error('tax_number')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="vat">VAT</label>
                <input type="text" class="form-control @error('vat') is-invalid @enderror" id="vat" name="vat"
                    value="{{ old('vat', $company->vat) }}" required>
                @error('vat')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Perusahaan</button>
        </form>
    </div>
@endsection
