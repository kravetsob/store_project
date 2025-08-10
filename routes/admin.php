<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/admin/dashboard', [DashboardController::class, 'login'])->name('dashboard.login');

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', fn () => view('dashboard.index'))->name('home');

    Route::resource('categories', CategoryController::class)
        ->except(['show'])->names('categories');

    Route::resource('products', ProductController::class)
        ->except(['show'])->names('products');

    Route::resource('orders', OrderController::class)
        ->except(['show'])->names('orders');

    Route::resource('users', UserController::class)
        ->except(['show'])->names('users');

    Route::resource('order-details', OrderDetailController::class)
        ->except(['show'])->names('order_details');
});
