@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Order #{{ $order->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <div class="form-group">
            <label for="total_amount">Total Amount</label>
            <input type="number" step="0.01" class="form-control" id="total_amount" name="total_amount" value="{{ old('total_amount', $order->total_amount) }}" required>
        </div>

        <h3>Shipping Information</h3>
        <div class="form-group">
            <label for="shipping_first_name">First Name</label>
            <input type="text" class="form-control" id="shipping_first_name" name="shipping_first_name" value="{{ old('shipping_first_name', $order->shipping_first_name) }}" required>
        </div>
        <div class="form-group">
            <label for="shipping_last_name">Last Name</label>
            <input type="text" class="form-control" id="shipping_last_name" name="shipping_last_name" value="{{ old('shipping_last_name', $order->shipping_last_name) }}" required>
        </div>
        <div class="form-group">
            <label for="shipping_address">Address</label>
            <input type="text" class="form-control" id="shipping_address" name="shipping_address" value="{{ old('shipping_address', $order->shipping_address) }}" required>
        </div>
        <div class="form-group">
            <label for="shipping_city">City</label>
            <input type="text" class="form-control" id="shipping_city" name="shipping_city" value="{{ old('shipping_city', $order->shipping_city) }}" required>
        </div>
        <div class="form-group">
            <label for="shipping_state">State</label>
            <input type="text" class="form-control" id="shipping_state" name="shipping_state" value="{{ old('shipping_state', $order->shipping_state) }}" required>
        </div>
        <div class="form-group">
            <label for="shipping_zip">Zip</label>
            <input type="text" class="form-control" id="shipping_zip" name="shipping_zip" value="{{ old('shipping_zip', $order->shipping_zip) }}" required>
        </div>
        <div class="form-group">
            <label for="shipping_phone">Phone</label>
            <input type="text" class="form-control" id="shipping_phone" name="shipping_phone" value="{{ old('shipping_phone', $order->shipping_phone) }}" required>
        </div>
        <div class="form-group">
            <label for="shipping_email">Email</label>
            <input type="email" class="form-control" id="shipping_email" name="shipping_email" value="{{ old('shipping_email', $order->shipping_email) }}" required>
        </div>

        <h3>Billing Information</h3>
        <div class="form-group">
            <label for="billing_first_name">First Name</label>
            <input type="text" class="form-control" id="billing_first_name" name="billing_first_name" value="{{ old('billing_first_name', $order->billing_first_name) }}" required>
        </div>
        <div class="form-group">
            <label for="billing_last_name">Last Name</label>
            <input type="text" class="form-control" id="billing_last_name" name="billing_last_name" value="{{ old('billing_last_name', $order->billing_last_name) }}" required>
        </div>
        <div class="form-group">
            <label for="billing_address">Address</label>
            <input type="text" class="form-control" id="billing_address" name="billing_address" value="{{ old('billing_address', $order->billing_address) }}" required>
        </div>
        <div class="form-group">
            <label for="billing_city">City</label>
            <input type="text" class="form-control" id="billing_city" name="billing_city" value="{{ old('billing_city', $order->billing_city) }}" required>
        </div>
        <div class="form-group">
            <label for="billing_state">State</label>
            <input type="text" class="form-control" id="billing_state" name="billing_state" value="{{ old('billing_state', $order->billing_state) }}" required>
        </div>
        <div class="form-group">
            <label for="billing_zip">Zip</label>
            <input type="text" class="form-control" id="billing_zip" name="billing_zip" value="{{ old('billing_zip', $order->billing_zip) }}" required>
        </div>
        <div class="form-group">
            <label for="billing_phone">Phone</label>
            <input type="text" class="form-control" id="billing_phone" name="billing_phone" value="{{ old('billing_phone', $order->billing_phone) }}" required>
        </div>
        <div class="form-group">
            <label for="billing_email">Email</label>
            <input type="email" class="form-control" id="billing_email" name="billing_email" value="{{ old('billing_email', $order->billing_email) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Order</button>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
