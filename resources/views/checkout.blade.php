<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Checkout</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}" type="text/css">
    <style>
        .checkout__input__radio label {
            font-size: 14px; /* Adjust as needed */
            padding-left: 25px; /* Adjust as needed */
            margin-bottom: 5px; /* Reduce space between radio options */
        }

        .checkout__input__radio input[type="radio"] {
            width: 16px; /* Adjust as needed */
            height: 16px; /* Adjust as needed */
        }

        .checkout__input__radio .checkmark {
            top: 2px; /* Adjust vertical alignment */
            left: 0; /* Adjust horizontal alignment */
        }

        /* Further adjustments for overall spacing if needed */
        .checkout__input {
            margin-bottom: 10px; /* Reduce space between input groups */
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{ asset('template/img/icon/search.png') }}" alt=""></a>
            <a href="#"><img src="{{ asset('template/img/icon/heart.png') }}" alt=""></a>
            <a href="#"><img src="{{ asset('template/img/icon/cart.png') }}" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <a href="#">Sign in</a>
                                <a href="#">FAQs</a>
                            </div>
                            <div class="header__top__hover">
                                <span>Usd <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li>USD</li>
                                    <li>EUR</li>
                                    <li>USD</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="{{ asset('template/img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('shop.index') }}">Shop</a></li>
                            <li><a href="{{ route('shopping.cart') }}">Shopping Cart</a></li>
                            <li class="active"><a href="{{ route('checkout') }}">Check Out</a></li>
                        </ul>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="{{ asset('template/img/icon/search.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('template/img/icon/heart.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('template/img/icon/cart.png') }}" alt=""> <span>0</span></a>
                        <div class="price">$0.00</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="{{ route('shop.index') }}">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="checkout__title">Alamat Pengiriman</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Nama Depan<span>*</span></p>
                                    <input type="text" name="shipping_first_name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Nama Belakang<span>*</span></p>
                                    <input type="text" name="shipping_last_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Negara<span>*</span></p>
                            <input type="text" name="shipping_country" required>
                        </div>
                        <div class="checkout__input">
                            <p>Alamat<span>*</span></p>
                            <input type="text" name="shipping_address" placeholder="Nama Jalan, Nomor Rumah, Apartemen, Unit, dll." class="checkout__input__add" required>
                        </div>
                        <div class="checkout__input">
                            <p>Kota<span>*</span></p>
                            <input type="text" name="shipping_city" required>
                        </div>
                        <div class="checkout__input">
                            <p>Provinsi<span>*</span></p>
                            <input type="text" name="shipping_state" required>
                        </div>
                        <div class="checkout__input">
                            <p>Kode Pos<span>*</span></p>
                            <input type="text" name="shipping_zip" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Telepon<span>*</span></p>
                                    <input type="text" name="shipping_phone" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="email" name="shipping_email" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="bill_same_as_ship">
                                Alamat Penagihan sama dengan Alamat Pengiriman?
                                <input type="checkbox" id="bill_same_as_ship" name="bill_same_as_ship" value="1" {{ old('bill_same_as_ship', true) ? 'checked' : '' }}>
                                <input type="hidden" name="bill_same_as_ship" value="0">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <div id="billing_address_fields" style="display: none;">
                            <h6 class="checkout__title">Alamat Penagihan</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nama Depan<span>*</span></p>
                                        <input type="text" name="billing_first_name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nama Belakang<span>*</span></p>
                                        <input type="text" name="billing_last_name">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Negara<span>*</span></p>
                                <input type="text" name="billing_country">
                            </div>
                            <div class="checkout__input">
                                <p>Alamat<span>*</span></p>
                                <input type="text" name="billing_address" placeholder="Nama Jalan, Nomor Rumah, Apartemen, Unit, dll." class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>Kota<span>*</span></p>
                                <input type="text" name="billing_city">
                            </div>
                            <div class="checkout__input">
                                <p>Provinsi<span>*</span></p>
                                <input type="text" name="billing_state">
                            </div>
                            <div class="checkout__input">
                                <p>Kode Pos<span>*</span></p>
                                <input type="text" name="billing_zip">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Telepon<span>*</span></p>
                                        <input type="text" name="billing_phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="billing_email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Catatan Pesanan<span>*</span></p>
                            <input type="text" name="order_notes" placeholder="Catatan tentang pesanan Anda, mis. catatan khusus untuk pengiriman.">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Ringkasan Pesanan</h4>
                            <ul class="checkout__total__products">
                                @foreach($cart as $id => $details)
                                    <li>{{ $details['name'] }} <span>${{ number_format($details['price'] * $details['quantity'], 2) }}</span></li>
                                @endforeach
                            </ul>
                            <div class="checkout__input">
                                <p>Metode Pengiriman<span>*</span></p>
                                <div class="checkout__input__radio">
                                    <label for="delivery_express">
                                        Express (Rp 25.000)
                                        <input type="radio" id="delivery_express" name="delivery_method" value="express" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__radio">
                                    <label for="delivery_regular">
                                        Biasa (Rp 10.000)
                                        <input type="radio" id="delivery_regular" name="delivery_method" value="regular">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Metode Pembayaran<span>*</span></p>
                                <div class="checkout__input__radio">
                                    <label for="payment_bank_transfer">
                                        Transfer Bank
                                        <input type="radio" id="payment_bank_transfer" name="payment_method" value="bank_transfer" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__radio">
                                    <label for="payment_e_wallet">
                                        E-wallet
                                        <input type="radio" id="payment_e_wallet" name="payment_method" value="e_wallet">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__radio">
                                    <label for="payment_cod">
                                        Cash On Delivery (COD)
                                        <input type="radio" id="payment_cod" name="payment_method" value="cod">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>

                            <ul class="checkout__total__all">
                                <li>Subtotal <span>Rp {{ number_format($total, 0, ',', '.') }}</span></li>
                                <li>Pengiriman <span id="shipping_cost_display">Rp 25.000</span></li>
                                <li>Total <span id="grand_total_display">Rp {{ number_format($total + 25000, 0, ',', '.') }}</span></li>
                            </ul>
                            <button type="submit" class="site-btn">SELESAIKAN PEMESANAN</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{ asset('template/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('template/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/js/main.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const billSameAsShipCheckbox = document.getElementById('bill_same_as_ship');
            const billingAddressFields = document.getElementById('billing_address_fields');

            function toggleBillingAddressFields() {
                if (billSameAsShipCheckbox.checked) {
                    billingAddressFields.style.display = 'none';
                } else {
                    billingAddressFields.style.display = 'block';
                }
            }

            billSameAsShipCheckbox.addEventListener('change', toggleBillingAddressFields);
            toggleBillingAddressFields();

            // Delivery and Payment Method Logic
            const deliveryExpress = document.getElementById('delivery_express');
            const deliveryRegular = document.getElementById('delivery_regular');
            const shippingCostDisplay = document.getElementById('shipping_cost_display');
            const grandTotalDisplay = document.getElementById('grand_total_display');

            const baseTotal = {{ $total }};
            const shippingCosts = {
                'express': 25000,
                'regular': 10000
            };

            function updateOrderSummary() {
                let selectedShippingCost = 0;
                if (deliveryExpress.checked) {
                    selectedShippingCost = shippingCosts.express;
                } else if (deliveryRegular.checked) {
                    selectedShippingCost = shippingCosts.regular;
                }

                shippingCostDisplay.textContent = 'Rp ' + selectedShippingCost.toLocaleString('id-ID');
                grandTotalDisplay.textContent = 'Rp ' + (baseTotal + selectedShippingCost).toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
            }

            deliveryExpress.addEventListener('change', updateOrderSummary);
            deliveryRegular.addEventListener('change', updateOrderSummary);

            // Initial update for order summary
            updateOrderSummary();

            // Payment method details (initially hidden, will be shown on separate pages)
            // No specific show/hide logic needed here as redirection handles it.
        });
    </script>
</body>

</html>
