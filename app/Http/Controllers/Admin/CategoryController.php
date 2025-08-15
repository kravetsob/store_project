<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of all categories.
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(Category $category)
    {
        return view("dashboard.categories.index", [
            'categories' => $category->all(),
        ]);
    }

    /**
     * Show the form for creating a new category.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Show the form for editing the specified category.
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Category $category)
    {
        return view("dashboard.categories.edit", [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified category in storage.
     * @param Category $category
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Category $category, Request $request)
    {
        $category->handle($request);

        return redirect()->route("dashboard.categories.index");
    }

    /**
     * Store created category in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->handle($request);

        return redirect()->route("dashboard.categories.index");
    }

    /**
     * Remove the specified category from storage.
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("dashboard.categories.index");
    }
}
