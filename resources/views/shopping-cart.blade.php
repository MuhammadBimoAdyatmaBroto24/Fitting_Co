@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($cart as $id => $details)
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="{{ asset('template/' . $details['image']) }}" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $details['name'] }}</h6>
                                                <h5>Rp{{ number_format($details['price'], 0, ',', '.') }}</h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty-2">
                                                    <form action="{{ route('cart.update', $id) }}" method="POST">
                                                        @csrf
                                                        <input type="text" name="quantity" value="{{ $details['quantity'] }}" onchange="this.form.submit()">
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">Rp{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</td>
                                        <td class="cart__close">
                                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="border: none; background: none;"><span class="icon_close"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Your cart is empty.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{ route('shop.index') }}">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            @php
                                $subtotal = 0;
                                foreach ($cart as $item) {
                                    $subtotal += $item['price'] * $item['quantity'];
                                }
                            @endphp
                            <li>Subtotal <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span></li>
                            <li>Total <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span></li>
                        </ul>
                        <a href="{{ route('checkout') }}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
