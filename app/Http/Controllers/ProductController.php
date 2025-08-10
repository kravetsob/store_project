<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
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
