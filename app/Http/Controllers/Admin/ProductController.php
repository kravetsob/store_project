<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    private string $section = 'products';
    public function index(Product $product)
    {
        return view ("dashboard.{$this->section}.index", [
            'products' => $product->all()
        ]);
    }
}
