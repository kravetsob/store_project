<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of all products.
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(Product $product)
    {
        return view("dashboard.products.index", [
            'products' => $product->all(),
        ]);
    }

    /**
     * Show the form for creating a new product.
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create(Category $category)
    {
        return view('dashboard.products.create', [
            'categories' => $category->all(),
        ]);
    }

    /**
     * Show the form for editing the specified product.
     * @param Product $product
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Product $product, Category $category)
    {
        return view("dashboard.products.edit", [
            'product' => $product,
            'categories' => $category->all(),
        ]);
    }

    /**
     * Update the specified product in storage.
     * @param Product $product
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Product $product, Request $request)
    {
        $product->handle($request);

        return redirect()->route("dashboard.products.index");
    }

    /**
     * Store created product in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->handle($request);

        return redirect()->route("dashboard.products.index");
    }

    /**
     * Remove the specified product from storage.
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        if ($product->orderDetails()->count() > 0) {
            return redirect()->back()->withErrors('You cannot delete this product because it contains order-details. Please remove the orders first.');
        }
        $product->delete();
        return redirect()->route("dashboard.products.index");
    }
}
