<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CommentController; // Add this line
use App\Http\Controllers\Admin\ProductSizeController; // Add this line

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('finance', FinanceController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('product-sizes', ProductSizeController::class)->except(['create', 'store', 'destroy']);

    Route::get('users/{user}/orders', [UserController::class, 'showOrders'])->name('users.orders');
    Route::get('users/summary', [UserController::class, 'customerSummary'])->name('users.summary');
});