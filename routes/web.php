<?php

use App\Http\Controllers\Site\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Site\ProductController;

Auth::routes(['register' => false]);

//site routes
Route::get('/',[IndexController::class,'index'])->name('index');
Route::get('categories/{category}/products', [ProductController::class, 'getByCategory'])->name('categories.products');
Route::get('products/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('cart/order', [OrderController::class, 'show'])->name('cart.order');
Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('thank-you', [OrderController::class, 'store'])->name('order.store');

//admin routes
Route::middleware('auth')->prefix('dashboard')
    ->as('dashboard.')
    ->group(function () {

        Route::get('/', function() {
            return view('dashboard.index');
        })->name('home');

        Route::resource('categories', AdminCategoryController::class)
            ->except(['show'])
            ->names('categories');

        Route::resource('products', AdminProductController::class)
            ->except(['show'])
            ->names('products');

        Route::resource('orders', AdminOrderController::class)
            ->except(['show'])
            ->names('orders');

        Route::resource('users', UserController::class)
            ->except(['show'])
            ->names('users');
});



