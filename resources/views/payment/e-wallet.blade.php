@extends('layouts.app')

@section('title', 'E-wallet Payment')

@section('content')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>E-wallet Payment</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <span>E-wallet Payment</span>
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
                        <h6 class="checkout__title">Detail Pembayaran E-wallet untuk Pesanan #{{ $order->id }}</h6>
                        <p>Silakan lakukan pembayaran melalui aplikasi E-wallet pilihan Anda.</p>
                        <ul>
                            <li>Penyedia E-wallet: GO PAY</li>
                            <li>Nomor Telepon/ID: 081234567890</li>
                            <li>Jumlah: Rp {{ number_format($order->total_amount + $order->shipping_cost, 0, ',', '.') }}</li>
                        </ul>
                        <p>Setelah pembayaran, pesanan Anda akan diproses. Anda dapat melihat detail pesanan Anda <a href="{{ route('order.details', $order->id) }}">di sini</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
