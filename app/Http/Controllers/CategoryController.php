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

        return redirect()->route('admin.categories.index');
    }

    public function delete(Category $category) {
        $category->delete();

        return redirect()->route('admin.categories.list');
    }
}
