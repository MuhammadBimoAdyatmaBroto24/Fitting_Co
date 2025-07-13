@extends('layouts.app')

@section('title', 'Cash On Delivery Payment')

@section('content')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Cash On Delivery (COD) Payment</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <span>Cash On Delivery (COD) Payment</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <div class="row">
                    <div class="col-lg-12">
                        <h6 class="checkout__title">Detail Pembayaran Cash On Delivery (COD) untuk Pesanan #{{ $order->id }}</h6>
                        <p>Anda telah memilih metode pembayaran Cash On Delivery (COD). Anda akan membayar saat pesanan tiba di alamat pengiriman Anda.</p>
                        <p>Total yang harus dibayar: Rp {{ number_format($order->total_amount + $order->shipping_cost, 0, ',', '.') }}</p>
                        <p>Pesanan Anda akan segera diproses. Anda dapat melihat detail pesanan Anda <a href="{{ route('order.details', $order->id) }}">di sini</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection