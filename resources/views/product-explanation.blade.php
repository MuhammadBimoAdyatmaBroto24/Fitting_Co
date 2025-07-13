@extends('layouts.app')

@section('title', $product->name)

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop Details</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="{{ route('shop.index') }}">Shop</a>
                            <span>{{ $product->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach($product->images as $key => $image)
                            <li class="nav-item">
                                <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#tabs-{{ $key + 1 }}" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ asset($image) }}">
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            @foreach($product->images as $key => $image)
                            <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="tabs-{{ $key + 1 }}" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{ asset($image) }}" alt="{{ $product->name }}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{ $product->name }}</h4>
                            <div class="rating">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($product->rating > $i)
                                        <i class="fa fa-star"></i>
                                    @else
                                        <i class="fa fa-star-o"></i>
                                    @endif
                                @endfor
                                <span> - {{ $product->reviews_count ?? 0 }} Reviews</span> {{-- Assuming reviews_count exists or default to 0 --}}
                            </div>
                            <h3>Rp {{ number_format($product->price, 0, ',', '.') }} @if($product->old_price)<span>Rp {{ number_format($product->old_price, 0, ',', '.') }}</span>@endif</h3>
                            <p>{{ $product->description }}</p>

                            @if($product->sizes->count() > 0)
                                <div class="product__details__option">
                                    <div class="product__details__option__size">
                                        <span>Ukuran:</span>
                                        @foreach($product->sizes as $size)
                                            <label for="size-{{ $size->id }}">{{ $size->size }}
                                                <input type="radio" id="size-{{ $size->id }}" name="product_size" value="{{ $size->size }}" data-stock="{{ $size->stock }}">
                                            </label>
                                            <span class="stock-info">(Stok: {{ $size->stock }})</span>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <p>Ukuran tidak tersedia untuk produk ini.</p>
                            @endif

                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" id="qty-input">
                                    </div>
                                </div>
                                <a href="#" class="primary-btn add-cart" data-product-slug="{{ $product->slug }}" data-product-id="{{ $product->id }}">add to cart</a>
                            </div>
                            <div class="product__details__btns__option">
                                <a href="#" class="wishlist-toggle {{ Auth::check() && Auth::user()->wishlist->contains($product->id) ? 'active' : '' }}" data-product-slug="{{ $product->slug }}"><i class="fa fa-heart"></i> add to wishlist</a>
                                <a href="#"><i class="fa fa-exchange"></i> Add To Compare</a>
                            </div>
                            <div class="product__details__last__option"
                                <ul>
                                    <li><span>SKU:</span> {{ $product->sku }}</li>
                                    <li><span>Categories:</span> {{ $product->category->name ?? 'N/A' }}</li>
                                    <li><span>Tag:</span> {{ $product->tags ?? 'N/A' }}</li> {{-- Assuming tags is a string or can be converted --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                    role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                                    Previews(5)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Additional
                                    information</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">{{ $product->description }}</p>
                                        {{-- You can add more detailed product info here if available --}}
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <h5>Customer Reviews</h5>
                                        <p>No reviews yet.</p> {{-- Placeholder for reviews --}}
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-7" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <h5>Additional Information</h5>
                                        <p>SKU: {{ $product->sku }}</p>
                                        <p>Categories: {{ $product->category->name ?? 'N/A' }}</p>
                                        <p>Tags: {{ $product->tags ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row">
                @forelse($relatedProducts as $relatedProduct)
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/' . $relatedProduct->image) }}">
                            @if($relatedProduct->is_new)
                                <span class="label">New</span>
                            @endif
                            @if($relatedProduct->is_sale)
                                <span class="label">Sale</span>
                            @endif
                            <ul class="product__hover">
                                <li><a href="#" class="wishlist-toggle {{ Auth::check() && Auth::user()->wishlist->contains($relatedProduct->id) ? 'active' : '' }}" data-product-slug="{{ $relatedProduct->slug }}"><img src="{{ asset('template/img/icon/heart.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('template/img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                                <li><a href="{{ route('product.explain', $relatedProduct->slug) }}"><img src="{{ asset('template/img/icon/search.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>{{ $relatedProduct->name }}</h6>
                            <a href="#" class="add-cart" data-product-slug="{{ $relatedProduct->slug }}" data-product-id="{{ $relatedProduct->id }}">+ Add To Cart</a>
                            <div class="rating">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($relatedProduct->rating > $i)
                                        <i class="fa fa-star"></i>
                                    @else
                                        <i class="fa fa-star-o"></i>
                                    @endif
                                @endfor
                            </div>
                            <h5>Rp {{ number_format($relatedProduct->price, 0, ',', '.') }} @if($relatedProduct->old_price)<span>Rp {{ number_format($relatedProduct->old_price, 0, ',', '.') }}</span>@endif</h5>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-12">
                    <p>No related products found.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Related Section End -->

@endsection

@section('scripts')
<script>
    console.log('Script product-explanation.blade.php loaded.');
    // Quantity selector (pro-qty)
    var proQty = '.pro-qty';
    $(proQty).prepend('<span class="fa fa-angle-up dec qtybtn"></span>');
    $(proQty).append('<span class="fa fa-angle-down inc qtybtn"></span>');
    $('.qtybtn').on('click', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below 1
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find('input').val(newVal);
    });

    // Add to Cart functionality
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.add-cart').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Add to Cart button clicked! Preventing default.');
                const productSlug = this.dataset.productSlug;
                const productId = this.dataset.productId; // Get product ID
                const quantity = document.getElementById('qty-input').value; // Get quantity

                // Get selected size from radio buttons
                let selectedSize = null;
                const sizeRadios = document.querySelectorAll('input[name="product_size"]');
                sizeRadios.forEach(radio => {
                    if (radio.checked) {
                        selectedSize = radio.value;
                    }
                });

                if (sizeRadios.length > 0 && !selectedSize) {
                    alert('Mohon pilih ukuran produk.');
                    return;
                }

                let selectedStock = null;
                if (selectedSize) {
                    const selectedRadio = document.querySelector(`input[name="product_size"][value="${selectedSize}"]`);
                    selectedStock = parseInt(selectedRadio.dataset.stock);
                }

                if (selectedStock !== null && quantity > selectedStock) {
                    alert('Kuantitas yang diminta melebihi stok yang tersedia untuk ukuran ini.');
                    return;
                }

                // Prepare data for AJAX
                const postData = {
                    _token: '{{ csrf_token() }}',
                    quantity: quantity
                };
                if (selectedSize) {
                    postData.size = selectedSize;
                }

                // Send AJAX request
                $.ajax({
                    url: `{{ url('/cart/add/') }}/${productSlug}`,
                    method: 'POST',
                    data: postData,
                    success: function(response) {
                        console.log('Product added to cart successfully!', response);
                        // Redirect to shopping cart page
                        window.location.href = '{{ route('shopping.cart') }}';
                    },
                    error: function(xhr) {
                        console.error('Error adding product to cart:', xhr);
                        let errorMessage = 'Terjadi kesalahan saat menambahkan produk ke keranjang.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseText) {
                            errorMessage = xhr.responseText;
                        }
                        alert(errorMessage);
                    }
                });
            });
        });
    });
</script>
@endsection
