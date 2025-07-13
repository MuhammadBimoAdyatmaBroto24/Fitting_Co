<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Fitting-Co')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Font Preloads -->
    <link rel="preload" href="{{ asset('template/fonts/ElegantIcons.woff') }}" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="{{ asset('template/fonts/fontawesome-webfont.woff2') }}" as="font" type="font/woff2" crossorigin>


    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}" type="text/css">
    <link rel="preload" href="{{ asset('template/fonts/ElegantIcons.woff') }}" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="{{ asset('template/fonts/fontawesome-webfont.woff2') }}" as="font" type="font/woff2" crossorigin>
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
                @guest
                    <a href="{{ route('login') }}">Login / Register</a>
                    <a href="#">FAQs</a>
                @endguest
                @auth
                    <a href="{{ route('profile') }}">Profile</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">Logout</button>
                    </form>
                @endauth
            </div>
            <div class="offcanvas__top__hover">
                <span> <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{ asset('template/img/icon/search.png') }}" alt=""></a>
            <a href="{{ route('wishlist.index') }}"><img src="{{ asset('template/img/icon/heart.png') }}" alt=""></a>
            <a href="{{ route('shopping.cart') }}"><img src="{{ asset('template/img/icon/cart.png') }}" alt=""> <span id="cart-count">0</span></a>
            <div class="price" id="cart-total">$0.00</div>
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
                            <p>Fitting co membuat anda jauh lebih baik tentang fashion</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                @guest
                                    <a href="{{ route('login') }}">Login / Register</a>
                                    <a href="{{ route('contact') }}">FAQs</a>
                                @endguest
                                @auth
                                    <a href="{{ route('profile') }}">Profile</a>
                                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" style="background: none; border: none; color: white; cursor: pointer;">Logout</button>
                                    </form>
                                @endauth
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
                        <a href="{{ route('home') }}"><img src="{{ asset('template/img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('shop.index') }}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('best.sellers') }}">Best Sellers</a></li> <!-- Moved link -->
                                    <li><a href="{{ route('shop.index') }}">Shop Details</a></li> {{-- Temporarily linking to shop index --}}
                                    <li><a href="{{ route('shopping.cart') }}">Shopping Cart</a></li>
                                    <li><a href="{{ route('checkout') }}">Check Out</a></li>
                                    <li><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
                                    <li><a href="{{ route('blog.index') }}">Blog Details</a></li> {{-- Assuming blog.index for now --}}
                                </ul>
                            </li>
                            <li><a href="{{ route('blog.index') }}">Blog</a></li>
                            <li><a href="{{ route('contact') }}">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="{{ asset('template/img/icon/search.png') }}" alt=""></a>
                        <a href="{{ route('wishlist.index') }}"><img src="{{ asset('template/img/icon/heart.png') }}" alt=""></a>
                        <a href="{{ route('shopping.cart') }}"><img src="{{ asset('template/img/icon/cart.png') }}" alt=""> <span id="cart-count">0</span></a>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    @yield('content')

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

    <!-- Add to Cart Success Modal -->
    <div class="modal fade" id="addToCartSuccessModal" tabindex="-1" role="dialog" aria-labelledby="addToCartSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addToCartSuccessModalLabel">Produk Berhasil Ditambahkan!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Message will be inserted here by JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Lanjut Belanja</button>
                    <a href="{{ route('shopping.cart') }}" class="btn btn-primary">Lanjut ke Keranjang</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add to Cart Success Modal -->

    <!-- Login/Register Modal -->
    <div class="modal fade" id="loginRegisterModal" tabindex="-1" role="dialog" aria-labelledby="loginRegisterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginRegisterModalLabel">Authentication Required</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Please log in or register to continue shopping.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login/Register Modal -->

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
    <script src="{{ asset('template/js/wishlist.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Function to update cart display
            function updateCartDisplay(cartCount, cartTotal) {
                $('#cart-count').text(cartCount);
                $('#cart-total').text('' + cartTotal);
            }

            // Initial cart load (if needed, e.g., from session on page load)
            // You might need an AJAX call here to get initial cart data
            // For now, let's assume it's handled by Laravel on page load or a separate script

            // Wishlist Toggle AJAX
            $('.wishlist-toggle').on('click', function(e) {
                e.preventDefault();
                var productSlug = $(this).data('product-slug');
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '/wishlist/toggle/' + productSlug,
                    method: 'POST',
                    data: {
                        _token: csrfToken
                    },
                    success: function(response) {
                        // You can add feedback to the user here, e.g., changing the heart icon color
                        alert('Wishlist updated!');
                    },
                    error: function(xhr) {
                        if (xhr.status === 401) {
                            $('#loginRegisterModal').modal('show');
                        }
                    }
                });
            });
        });
    </script>
    @yield('scripts')
</body>

</html>
