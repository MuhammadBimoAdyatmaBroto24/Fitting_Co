@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Order Details #{{ $order->id }}</h1>

    <div class="card mb-3">
        <div class="card-header">
            Order Information
        </div>
        <div class="card-body">
            <p><strong>Customer:</strong> {{ $order->user->name ?? 'Guest' }}</p>
            <p><strong>Total Amount:</strong> Rp {{ number_format($order->total_amount, 2, ',', '.') }}</p>
            <p><strong>Status:</strong> {{ $order->status }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
            <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
            <p><strong>Delivery Method:</strong> {{ $order->delivery_method }}</p>
            <p><strong>Shipping Cost:</strong> Rp {{ number_format($order->shipping_cost, 2, ',', '.') }}</p>
            <p><strong>Order Notes:</strong> {{ $order->order_notes }}</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            Shipping Information
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $order->shipping_first_name }} {{ $order->shipping_last_name }}</p>
            <p><strong>Address:</strong> {{ $order->shipping_address }}, {{ $order->shipping_city }}, {{ $order->shipping_state }}, {{ $order->shipping_zip }}</p>
            <p><strong>Country:</strong> {{ $order->shipping_country }}</p>
            <p><strong>Phone:</strong> {{ $order->shipping_phone }}</p>
            <p><strong>Email:</strong> {{ $order->shipping_email }}</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            Billing Information
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $order->billing_first_name }} {{ $order->billing_last_name }}</p>
            <p><strong>Address:</strong> {{ $order->billing_address }}, {{ $order->billing_city }}, {{ $order->billing_state }}, {{ $order->billing_zip }}</p>
            <p><strong>Country:</strong> {{ $order->billing_country }}</p>
            <p><strong>Phone:</strong> {{ $order->billing_phone }}</p>
            <p><strong>Email:</strong> {{ $order->billing_email }}</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            Order Items
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name ?? 'N/A' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity * $item->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning">Edit Order</a>
    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?');">Delete Order</button>
    </form>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to Orders</a>
</div>
@endsection
