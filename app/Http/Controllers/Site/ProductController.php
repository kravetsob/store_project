<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        return view ('products.index', [
            'products' => $product->all()
        ]);
    }

    public function getByCategory(Category $category)
    {
        return view ('products.index',[
            'products' => $category->products()->get(),
            'category' => $category,
        ]);
    }

    public function show(Product $product)
    {
        return view ('products.show', [
            'product' => $product,
        ]);
    }
}
