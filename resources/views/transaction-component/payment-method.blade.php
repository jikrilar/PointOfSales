@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="bg-dark">Type</th>
                                        <th class="bg-dark">Name</th>
                                        <th class="bg-dark">Amount</th>
                                        <th class="bg-dark">Card ID</th>
                                        <th class="bg-dark">Company</th>
                                        <th class="bg-dark">Reference No</th>
                                        <th class="bg-dark">Date</th>
                                        <th class="bg-dark">Code</th>
                                        <th class="bg-dark">Cash Voucher %</th>
                                        <th class="bg-dark">Nett</th>
                                        <th class="bg-dark">Promoter</th>
                                        <th class="bg-dark">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $item)
                                        <tr class="item-row" data-code="{{ $item['code'] }}" data-name="{{ $item['name'] }}"
                                            data-price="{{ number_format($item['price'], 0, ',', '.') }}"
                                            data-qty="{{ $item['qty'] }}"
                                            data-subtotal="{{ number_format($item['subtotal'], 0, ',', '.') }}">
                                            <td>{{ $item['id'] }}</td>
                                            <td>{{ $item['code'] }}</td>
                                            <td>{{ $item['name'] }}</td>
                                            <td>{{ number_format($item['price'], 0, ',', '.') }}</td>
                                            <td>
                                                <div class="input-group" style="max-width: 120px;">
                                                    <button type="button" class="btn btn-outline-secondary minus-btn"
                                                        data-id="{{ $item['id'] }}">-</button>
                                                    <input type="text" class="form-control qty-input text-center"
                                                        value="{{ $item['qty'] }}" readonly style="max-width: 50px;">
                                                    <button type="button" class="btn btn-outline-secondary plus-btn"
                                                        data-id="{{ $item['id'] }}">+</button>
                                                </div>
                                            </td>
                                            <td>{{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <form action="{{ route('transaction.remove', $item['id']) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                                <button class="btn btn-warning view-btn" data-id="{{ $item['id'] }}">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
