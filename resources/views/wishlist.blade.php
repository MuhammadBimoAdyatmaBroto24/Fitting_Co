@extends('layouts.app')

@section('title', 'My Wishlist')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>My Wishlist</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <span>Wishlist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Wishlist Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing {{ $wishlistProducts->firstItem() }}–{{ $wishlistProducts->lastItem() }} of {{ $wishlistProducts->total() }} results</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @forelse ($wishlistProducts as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/' . $product->image) }}">
                                        @if($product->is_new)
                                            <span class="label">New</span>
                                        @endif
                                        @if($product->is_sale)
                                            <span class="label">Sale</span>
                                        @endif
                                        <ul class="product__hover">
                                            <li><a href="#" class="wishlist-toggle" data-product-slug="{{ $product->slug }}"><img src="{{ asset('template/img/icon/heart.png') }}" alt=""></a></li>
                                            <li><a href="#"><img src="{{ asset('template/img/icon/compare.png') }}" alt=""> <span>Compare</span></a>
                                            </li>
                                            <li><a href="{{ route('product.explain', $product->slug) }}"><img src="{{ asset('template/img/icon/search.png') }}" alt=""></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>{{ $product->name }}</h6>
                                        @guest
                                        <a href="#" class="add-cart-guest" data-toggle="modal" data-target="#loginRegisterModal">+ Add To Cart</a>
                                        @else
                                        <a href="#" class="add-cart-auth" data-product-slug="{{ $product->slug }}">+ Add To Cart</a>
                                        @endguest
                                        <div class="rating">
                                            {{-- Assuming a rating system, otherwise remove or hardcode --}}
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>${{ number_format($product->price, 2) }} @if($product->old_price)<span>${{ number_format($product->old_price, 2) }}</span>@endif</h5>
                                        {{-- Color selection can be made dynamic if product has colors --}}
                                        <div class="product__color__select">
                                            <label for="pc-{{ $product->id }}-1">
                                                <input type="radio" id="pc-{{ $product->id }}-1">
                                            </label>
                                            <label class="active black" for="pc-{{ $product->id }}-2">
                                                <input type="radio" id="pc-{{ $product->id }}-2">
                                            </label>
                                            <label class="grey" for="pc-{{ $product->id }}-3">
                                                <input type="radio" id="pc-{{ $product->id }}-3">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12">
                                <p>Your wishlist is empty.</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                {{ $wishlistProducts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Wishlist Section End -->
@endsection
