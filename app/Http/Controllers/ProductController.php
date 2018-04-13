<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('admin.products.list', [
            'products' => $products,
        ]);
    }

    public function edit(Product $product) {
        return view('admin.products.edit', [
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

        return redirect()->route('admin.products.index');
    }

    public function delete(Product $product) {
        $product->delete();

        return redirect()->route('admin.products.list');
    }
}
