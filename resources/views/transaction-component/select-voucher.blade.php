@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <!-- Input Voucher -->
                        <div class="form-group mt-4">
                            <label for="voucher_code">Masukkan Kode Voucher</label>
                            <input type="text" id="voucher_code" class="form-control"
                                placeholder="Masukkan Kode Voucher Diskon">
                            <button type="button" id="apply_voucher" class="btn btn-success mt-2">Gunakan
                                Voucher</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
