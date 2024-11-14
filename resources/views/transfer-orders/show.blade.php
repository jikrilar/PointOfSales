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
                        <h1>Detail Transfer Order</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nomor Transfer</th>
                                <td>{{ $transferOrder->transfer_number }}</td>
                            </tr>
                            <tr>
                                <th>Dari Cabang</th>
                                <td>{{ $transferOrder->fromBranch->name }}</td>
                            </tr>
                            <tr>
                                <th>Ke Cabang</th>
                                <td>{{ $transferOrder->toBranch->name }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Transfer</th>
                                <td>{{ $transferOrder->transfer_date }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $transferOrder->status }}</td>
                            </tr>
                        </table>

                        <a href="{{ route('transfer_orders.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>
