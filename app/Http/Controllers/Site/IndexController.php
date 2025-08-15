<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    /**
     * Display the homepage with categories.
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(Category $category)
    {
        $categories = $category->orderBy('name', 'asc')->get();

        return view('index', [
            'categories' => $categories,
        ]);
    }

}
