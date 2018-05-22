<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function show(Request $request) {
        $cart = Cart::content();

        if ($request->has('form') && $request->get('form')) {
            $form = true;
        } else {
            $form = false;
        }

        return view('checkout', [
            'cart' => $cart,
            'form' => $form,
        ]);
    }

    public function clear() {
        Cart::destroy();
        return redirect()->back();
    }

    public function addProduct(Request $request) {
        $product = Product::find($request->get('product'));
        $quantity = $request->get('quantity', 1);

        if ($product && !$product->hidden) {
            Cart::add($product, $quantity);
        }

        return redirect()->back();
    }

    public function updateProduct(Request $request) {
        $rowId = $request->get('rowId');
        $quantity = $request->get('quantity');

        Cart::update($rowId, $quantity);
        return redirect()->back();
    }

    public function removeProduct(Request $request) {
        Cart::remove($request->get('rowId'));
        return redirect()->back();
    }

    public function store(Request $request) {
        $order = Order::create([
            'telegram_nick' => $request->get('telegram_nick'),
            'ingress_nick' => $request->get('ingress_nick'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'city' => $request->get('city'),
            'comment' => $request->get('comment'),
            'total' => intval(str_replace(',', '', Cart::subtotal())),
            'delivery' => $request->get('delivery', true),
        ]);

        foreach (Cart::content() as $item) {
            $order->products()->attach($item->id, [
                'price' => $item->price,
                'quantity' => $item->qty,
            ]);
        }

        # TODO: send email to admin & to customer

        Cart::destroy();

        $request->session()->flash('status', trans('main.cart.order-success'));
        return redirect()->route('index');
    }
}
