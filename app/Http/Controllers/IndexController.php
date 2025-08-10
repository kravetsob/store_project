<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
