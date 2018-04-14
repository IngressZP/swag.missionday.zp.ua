<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Storage;

class ProductController extends Controller
{
    public function index() {
        $products = Product::orderBy('category_id')->get();

        return view('admin.products.list', [
            'products' => $products,
        ]);
    }

    public function create() {
        $cats = Category::all();
        return view('admin.products.create', [
            'cats' => $cats,
        ]);
    }

    public function store(Request $request) {
        $lang = $request->get('lang');

        $product = Product::create([
            'price' => $request->get('price'),
            'category_id' => $request->get('category'),
            $lang => [
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ],
        ]);

        if($request->hasFile('main_image')) {
            $path = $request->main_image->store('uploads');
            $product->main_image = $path;
            $product->save();
        }

        $message = "Товар добавлен! ";
        $message .= "<a href='" . route('admin.products.edit', ['product' => $product->id]) . "'>Просмотр</a>";
        $request->session()->flash('status', $message);

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product) {
        $cats = Category::all();
        return view('admin.products.edit', [
            'cats' => $cats,
            'product' => $product
        ]);
    }

    public function update(Product $product, Request $request) {
        $lang = $request->get('lang');

        $product->update([
            $lang => [
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ],
        ]);

        if($request->hasFile('main_image')) {
            Storage::delete($product->main_image);
            $path = $request->main_image->store('uploads');
            $product->main_image = $path;
            $product->save();
        }

        $message = "Товар обновлен! ";
        $message .= "<a href='" . route('admin.products.edit', ['product' => $product->id]) . "'>Просмотр</a>";
        $request->session()->flash('status', $message);

        return redirect()->route('admin.products.index');
    }

    public function delete(Product $product, Request $request) {
        try {
            $product->delete();
            $request->session()->flash('status', 'Товар удален!');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Невозможно удалить товар');
        }

        return redirect()->route('admin.products.index');
    }
}
