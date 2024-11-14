@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Histori Penjualan: {{ $branch->name }}</h1>
        <div class="card">
            <div class="card-body">
                @if ($salesOrders->isEmpty())
                    <p>Tidak ada histori penjualan untuk cabang ini.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kode Penjualan</th>
                                <th>Total (Rp)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salesOrders as $order)
                                <tr>
                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $order->code }}</td>
                                    <td>{{ number_format($order->total, 0, ',', '.') }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
