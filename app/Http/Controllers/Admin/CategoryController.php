<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view("dashboard.categories.index", [
            'categories' => $category->all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function edit(Category $category)
    {
        return view("dashboard.categories.edit", [
            'category' => $category,
        ]);
    }

    /**
     * Обновление категории
     */
    public function update(Category $category, Request $request)
    {
        $category->handle($request); // Вызов метода экземпляра для сохранения/обновления

        return redirect()->route("dashboard.categories.index");
    }

    /**
     * Сохранение новой категории
     */
    public function store(Request $request)
    {
        $category = new Category;  // Создаем новый экземпляр
        $category->handle($request);  // Вызов метода экземпляра

        return redirect()->route("dashboard.categories.index");
    }

    /**
     * Удаление категории
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("dashboard.categories.index");
    }
}
