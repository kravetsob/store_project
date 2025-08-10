<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class CategoryController extends Controller
{
    private string $section = 'categories';

    public function index(Product $product)
    {
        return view("dashboard.{$this->section}.index", [
            'products' => $product->all(),
        ]);
    }
}
