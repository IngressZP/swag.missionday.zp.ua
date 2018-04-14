<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $cats = Category::all();

        return view('admin.categories.list', [
            'cats' => $cats,
        ]);
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        $lang = $request->get('lang');
        $title = $request->get('title');

        $category = Category::create([
            'slug' => str_slug($title),
            $lang => [
                'title' => $title
            ],
        ]);

        $message = "Категория добавлена! ";
        $message .= "<a href='" . route('admin.categories.edit', ['category' => $category->id]) . "'>Просмотр</a>";
        $request->session()->flash('status', $message);

        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category) {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Category $category, Request $request) {
        $lang = $request->get('lang');

        $category->update([
            $lang => [
                'title' => $request->get('title')
            ],
        ]);

        $message = "Категория обновлена! ";
        $message .= "<a href='" . route('admin.categories.edit', ['category' => $category->id]) . "'>Просмотр</a>";
        $request->session()->flash('status', $message);

        return redirect()->route('admin.categories.index');
    }

    public function delete(Category $category, Request $request) {
        try {
            $category->delete();
            $request->session()->flash('status', "Категория удалена!");
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Невозможно удалить категорию');
        }

        return redirect()->route('admin.categories.index');
    }
}
