<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        return view("dashboard.products.index", [
            'products' => $product->all(),
        ]);
    }

    public function create(Category $category)
    {
        return view('dashboard.products.create', [
            'categories' => $category->all(),
        ]);
    }

    public function edit(Product $product, Category $category)
    {
        return view("dashboard.products.edit", [
            'product' => $product,
            'categories' => $category->all(),
        ]);
    }

    public function update(Product $product, Request $request)
    {
        $product->handle($request);

        return redirect()->route("dashboard.products.index");
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->handle($request);

        return redirect()->route("dashboard.products.index");
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("dashboard.products.index");
    }
}
