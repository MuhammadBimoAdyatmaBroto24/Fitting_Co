<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController; // PERBAIKAN: Menambahkan import OrderController
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BestSellerController; // Add this line
use App\Http\Controllers\HomeController; // Add this line
use App\Http\Controllers\CommentController; // Add this line for comments

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});




// Publicly accessible shop routes
    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');



Route::get('/about', function () { return view('about'); })->name('about');

// Best Sellers Route
Route::get('/best-sellers', [BestSellerController::class, 'index'])->name('best.sellers');

// Blog Posts Routes
Route::get('/posts', [BlogController::class, 'index'])->name('blog.index');
Route::get('/posts/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Routes requiring authentication
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/product-explanation/{product:slug}', [ProductController::class, 'explain'])->name('product.explain');

    // New routes for template navigation
    Route::get('/shopping-cart', [CartController::class, 'index'])->name('shopping.cart');

    Route::post('/cart/add/{product:slug}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{product:slug}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update/{product:slug}', [CartController::class, 'update'])->name('cart.update');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');

    // Order Details Route
    Route::get('/order-details/{orderId}', [OrderController::class, 'showOrderDetails'])->name('order.details');

    // Profile Route
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Wishlist Routes
    Route::post('/wishlist/{product:slug}', [WishlistController::class, 'toggleWishlist'])->name('wishlist.toggle');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

    // Payment Routes
    Route::get('/payment/bank-transfer/{orderId}', function ($orderId) {
        $order = App\Models\Order::findOrFail($orderId);
        return view('payment.bank-transfer', compact('order'));
    })->name('payment.bank_transfer');

    Route::get('/payment/e-wallet/{orderId}', function ($orderId) {
        $order = App\Models\Order::findOrFail($orderId);
        return view('payment.e-wallet', compact('order'));
    })->name('payment.e_wallet');

    Route::get('/payment/cod/{orderId}', function ($orderId) {
        $order = App\Models\Order::findOrFail($orderId);
        return view('payment.cod', compact('order'));
    })->name('payment.cod');

});
