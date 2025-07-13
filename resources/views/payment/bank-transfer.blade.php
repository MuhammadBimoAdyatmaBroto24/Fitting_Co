@extends('layouts.app')

@section('title', 'Bank Transfer Payment')

@section('content')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Bank Transfer Payment</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <span>Bank Transfer Payment</span>
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
                        <h6 class="checkout__title">Detail Pembayaran Transfer Bank untuk Pesanan #{{ $order->id }}</h6>
                        <p>Silakan lakukan transfer ke rekening berikut:</p>
                        <ul>
                            <li>Bank: Bank Contoh</li>
                            <li>Nomor Rekening: 1234567890</li>
                            <li>Atas Nama: Nama Perusahaan</li>
                            <li>Jumlah: Rp {{ number_format($order->total_amount + $order->shipping_cost, 0, ',', '.') }}</li>
                        </ul>
                        <p>Setelah transfer, pesanan Anda akan diproses. Anda dapat melihat detail pesanan Anda <a href="{{ route('order.details', $order->id) }}">di sini</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
