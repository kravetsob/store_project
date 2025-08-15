<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a list of all products.
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(Product $product)
    {
        return view ('products.index', [
            'products' => $product->all()
        ]);
    }

    /**
     * Display products filtered by category.
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function getByCategory(Category $category)
    {
        return view ('products.index',[
            'products' => $category->products()->get(),
            'category' => $category,
        ]);
    }

    /**
     * Display a single product's details.
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Product $product)
    {
        return view ('products.show', [
            'product' => $product,
        ]);
    }
}
