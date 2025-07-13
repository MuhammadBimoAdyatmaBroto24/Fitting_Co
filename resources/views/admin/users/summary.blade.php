@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Customer Order Summary</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customer Summary List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Total Orders</th>
                            <th>Total Amount Spent</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->orders_count }}</td>
                            <td>{{ $customer->orders_sum_total_amount ?? 0 }}</td>
                            <td>
                                <a href="{{ route('admin.users.orders', $customer->id) }}" class="btn btn-info btn-sm">View Orders</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No customers found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
