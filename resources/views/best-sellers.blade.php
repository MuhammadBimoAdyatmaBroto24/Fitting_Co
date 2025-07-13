@extends('layouts.app')

@section('title', 'Best Sellers')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Best Sellers</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <span>Best Sellers</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                @forelse($bestSellers as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/' . $product->image) }}">
                                <ul class="product__hover">
                                    <li><a href="#"><img src="{{ asset('template/img/icon/heart.png') }}" alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('template/img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                    <li><a href="{{ route('product.explain', $product->slug) }}"><img src="{{ asset('template/img/icon/search.png') }}" alt=""></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ $product->name }}</h6>
                                <a href="{{ route('cart.add', $product->slug) }}" class="add-cart">+ Add To Cart</a>
                                <div class="rating">
                                    @for ($i = 0; $i < $product->rating; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    @for ($i = $product->rating; $i < 5; $i++)
                                        <i class="fa fa-star-o"></i>
                                    @endfor
                                </div>
                                <h5>${{ number_format($product->price, 2) }}</h5>
                                <div class="product__color__select">
                                    <label for="pc-1">
                                        <input type="radio" id="pc-1">
                                    </label>
                                    <label class="active black" for="pc-2">
                                        <input type="radio" id="pc-2">
                                    </label>
                                    <label class="grey" for="pc-3">
                                        <input type="radio" id="pc-3">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <p>No best-selling products found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection