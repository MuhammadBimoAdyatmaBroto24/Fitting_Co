@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Order Details</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Order Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Order Details Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <div class="row">
                    <div class="col-lg-12">
                        <h6 class="checkout__title">Order #{{ $order->id }} Details</h6>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="checkout__input">
                                    <p>Order Date: <span>{{ $order->created_at->format('M d, Y') }}</span></p>
                                </div>
                                <div class="checkout__input">
                                    <p>Order Status: <span>{{ ucfirst($order->status) }}</span></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="checkout__input">
                                    <p>Payment Method: <span>{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</span></p>
                                </div>
                                <div class="checkout__input">
                                    <p>Shipping Method: <span>{{ ucfirst($order->delivery_method) }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-6 col-md-6">
                        <h6 class="checkout__title">Shipping Address</h6>
                        <div class="checkout__input">
                            <p>{{ $order->shipping_first_name }} {{ $order->shipping_last_name }}</p>
                            <p>{{ $order->shipping_address }}</p>
                            <p>{{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_zip }}</p>
                            <p>{{ $order->shipping_country }}</p>
                            <p>Phone: {{ $order->shipping_phone }}</p>
                            <p>Email: {{ $order->shipping_email }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h6 class="checkout__title">Billing Address</h6>
                        <div class="checkout__input">
                            <p>{{ $order->billing_first_name }} {{ $order->billing_last_name }}</p>
                            <p>{{ $order->billing_address }}</p>
                            <p>{{ $order->billing_city }}, {{ $order->billing_state }} {{ $order->billing_zip }}</p>
                            <p>{{ $order->billing_country }}</p>
                            <p>Phone: {{ $order->billing_phone }}</p>
                            <p>Email: {{ $order->billing_email }}</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <h6 class="checkout__title">Order Items</h6>
                        <div class="shopping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($order->items) > 0)
                                        @foreach($order->items as $item)
                                            <tr>
                                                <td class="product__cart__item">
                                                    <div class="product__cart__item__pic">
                                                        {{-- Assuming product has an image, otherwise use a placeholder --}}
                                                        <img src="{{ asset('template/img/product/shopping-cart/cart-1.jpg') }}" alt="" style="width: 90px;">
                                                    </div>
                                                    <div class="product__cart__item__text">
                                                        <h6>{{ $item->product->name }}</h6>
                                                        <h5>Rp {{ number_format($item->price, 0, ',', '.') }}</h5>
                                                    </div>
                                                </td>
                                                <td class="quantity__item">
                                                    <div class="quantity">
                                                        <div class="pro-qty-2">
                                                            {{ $item->quantity }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cart__price">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">No items found for this order.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Order Summary</h4>
                            <ul class="checkout__total__all">
                                <li>Subtotal <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span></li>
                                <li>Shipping <span>Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span></li> {{-- Placeholder for shipping --}}
                                <li>Tax <span>Rp 0</span></li> {{-- Placeholder for tax --}}
                                <li>Total <span>Rp {{ number_format($order->total_amount + $order->shipping_cost, 0, ',', '.') }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Order Details Section End -->
@endsection