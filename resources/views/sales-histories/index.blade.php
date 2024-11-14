@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Histori Penjualan Per Cabang</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('sales-history.show', '') }}" method="GET" id="branchForm">
                <div class="form-group">
                    <label for="branch">Pilih Cabang:</label>
                    <select name="branch" id="branch" class="form-control" onchange="document.getElementById('branchForm').setAttribute('action', '{{ url('sales-history') }}/' + this.value); this.form.submit();">
                        <option value="" selected disabled>Pilih Cabang</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
