@extends('layouts.app')

@section('title', 'Shop')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="{{ route('shop.index') }}" method="GET">
                                <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    @foreach($categories as $category)
                                                        <li><a href="{{ route('shop.index', array_merge(request()->except('category'), ['category' => $category->slug])) }}">{{ $category->name }} ({{ $category->products->count() }})</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                    @foreach($brands as $brand)
                                                        <li><a href="{{ route('shop.index', array_merge(request()->except('brand'), ['brand' => $brand->slug])) }}">{{ $brand->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseClear">Clear Filters</a>
                                    </div>
                                    <div id="collapseClear" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__clear">
                                                <a href="{{ route('shop.index') }}" class="primary-btn">Clear All Filters</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of 126 results</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        @foreach ($products as $product)
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
                                            <li><a href="#" class="wishlist-toggle {{ Auth::check() && Auth::user()->wishlist->contains($product->id) ? 'active' : '' }}" data-product-slug="{{ $product->slug }}"><img src="{{ asset('template/img/icon/heart.png') }}" alt=""></a></li>
                                            <li><a href="#"><img src="{{ asset('template/img/icon/compare.png') }}" alt=""> <span>Compare</span></a>
                                            </li>
                                            <li><a href="{{ route('product.explain', $product->slug) }}"><img src="{{ asset('template/img/icon/search.png') }}" alt=""></a></li>
                                        </ul>
                                    </div>

                                    <div class="product__item__text">
                                        <br>
                                        <a href="{{ route('product.explain', $product->slug) }}" class="add-cart" data-product-slug="{{ $product->slug }}">{{ $product->name }}</a>
                                        <div class="rating">

                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>Rp {{ number_format($product->price, 0, ',', '.') }} @if($product->old_price)<span>Rp {{ number_format($product->old_price, 0, ',', '.') }}</span>@endif</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
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
