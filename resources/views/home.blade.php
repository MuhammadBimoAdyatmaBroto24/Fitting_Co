@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="{{ asset('template/img/hero/hero-1.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                                <a href="{{ route('shop.index') }}" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="{{ asset('template/img/hero/hero-2.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                                <a href="{{ route('shop.index') }}" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="{{ asset('template/img/banner/banner-1.jpg') }}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Clothing Collections 2030</h2>
                            <a href="{{ route('shop.index') }}">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="{{ asset('template/img/banner/banner-2.jpg') }}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Accessories</h2>
                            <a href="{{ route('shop.index') }}">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="{{ asset('template/img/banner/banner-3.jpg') }}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Shoes Spring 2030</h2>
                            <a href="{{ route('shop.index') }}">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Best Sellers</li>
                        <li data-filter=".new-arrivals">New Arrivals</li>
                        <li data-filter=".hot-sales">Hot Sales</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                @forelse($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6 mix new-arrivals">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/' . $product->image) }}">
                                @if($product->is_new)
                                    <span class="label">New</span>
                                @endif
                                @if($product->is_sale)
                                    <span class="label">Sale</span>
                                @endif
                                <ul class="product__hover">
                                    <li><a href="#" class="wishlist-toggle {{ Auth::check() && Auth::user()->wishlist->contains($product->id) ? 'active' : '' }}" data-product-slug="{{ $product->slug }}"><img src="{{ asset('template/img/icon/heart.png') }}" alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('template/img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                    <li><a href="{{ route('product.explain', $product->slug) }}"><img src="{{ asset('template/img/icon/search.png') }}" alt=""></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{ route('product.explain', $product->slug) }}">{{ $product->name }}</a></h6>
                                <form action="{{ route('cart.add', $product->slug) }}" method="POST" id="add-to-cart-form-{{ $product->id }}">
                                    @csrf

                                    <input type="hidden" name="quantity" value="1">
                                    <a href="{{ route('product.explain', $product->slug) }}" class="add-cart" data-product-slug="{{ $product->slug }}" class="add-cart js-add-to-cart" data-product-slug="{{ $product->slug }}" data-form-id="add-to-cart-form-{{ $product->id }}">{{ $product->name }}</a>
                                    <br>
                                </form>
                                <div class="rating">
                                    @for ($i = 0; $i < $product->rating; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    @for ($i = $product->rating; $i < 5; $i++)
                                        <i class="fa fa-star-o"></i>
                                    @endfor
                                </div>
                                <h5>Rp {{ number_format($product->price, 0, ',', '.') }} @if($product->old_price)<span>Rp {{ number_format($product->old_price, 0, ',', '.') }}</span>@endif</h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <p>No products found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="categories__text">
                        <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img src="{{ asset('template/img/product-sale.png') }}" alt="">
                        <div class="hot__deal__sticker">
                            <span>Sale Of</span>
                            <h5>$29.99</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Deal Of The Week</span>
                        <h2>Multi-pocket Chest Bag Black</h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>3</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Hours</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Minutes</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Seconds</p>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instagram__pic">
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('template/img/instagram/instagram-1.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('template/img/instagram/instagram-2.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('template/img/instagram/instagram-3.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('template/img/instagram/instagram-4.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('template/img/instagram/instagram-5.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('template/img/instagram/instagram-6.jpg') }}"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2>Instagram</h2>
                        <p>Fitting co cukup bisa memilih fashion anda yang instagramable,diluar sana banyak yang baik tapi kita jauh lebih baik :)</p>
                        <h3>#FittingCo</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Latest News</span>
                        <h2>New Trends</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($latestPosts as $post)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="{{ asset('storage/' . $post->image) }}"></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('template/img/icon/calendar.png') }}" alt=""> {{ $post->published_at->format('d F Y') }}</span>
                            <h5>{{ $post->title }}</h5>
                            <a href="{{ route('blog.show', $post->slug) }}">Read More</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-12">
                    <p>No latest blog posts found.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

@endsection

@push('scripts')
<script>
    document.querySelectorAll('.js-add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const formId = this.dataset.formId;
            const form = document.getElementById(formId);
            form.submit();
        });
    });
</script>
@endpush
