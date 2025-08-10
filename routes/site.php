web.php<?php

use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Site\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('categories/{category}/products', [ProductController::class, 'getByCategory'])->name('categories.products');
Route::get('products/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('cart/order', [OrderController::class, 'show'])->name('cart.order');
Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('thank-you', [OrderController::class, 'store'])->name('order.store');


