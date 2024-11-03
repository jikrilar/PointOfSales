@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Kasir</h1>
        <form action="{{ route('cashiers.update', $cashier->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $cashier->name) }}" required>
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email', $cashier->email) }}" required>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password</small>
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone_number">Nomor Telepon</label>
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                    name="phone_number" value="{{ old('phone_number', $cashier->phone_number) }}" required>
                @error('phone_number')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="branch_id">Cabang</label>
                <select class="form-control @error('branch_id') is-invalid @enderror" id="branch_id" name="branch_id"
                    required>
                    <option value="">Pilih Cabang</option>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}" {{ $branch->id == $cashier->branch_id ? 'selected' : '' }}>
                            {{ $branch->name }}</option>
                    @endforeach
                </select>
                @error('branch_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Kasir</button>
        </form>
    </div>
@endsection
