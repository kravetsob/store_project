<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function index(Category $category)
    {
        return view('index', [
            'categories' => $category->all(),
        ]);
    }

}
