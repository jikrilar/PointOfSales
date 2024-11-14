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
                        <h1>Edit Transfer Order</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('transfer_orders.update', $transferOrder->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="from_branch_id">Dari Cabang</label>
                                <select name="from_branch_id" id="from_branch_id" class="form-control">
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}"
                                            {{ $transferOrder->from_branch_id == $branch->id ? 'selected' : '' }}>
                                            {{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="to_branch_id">Ke Cabang</label>
                                <select name="to_branch_id" id="to_branch_id" class="form-control">
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}"
                                            {{ $transferOrder->to_branch_id == $branch->id ? 'selected' : '' }}>
                                            {{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="transfer_date">Tanggal Transfer</label>
                                <input type="date" name="transfer_date" class="form-control"
                                    value="{{ $transferOrder->transfer_date }}" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="pending" {{ $transferOrder->status == 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="completed"
                                        {{ $transferOrder->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>
