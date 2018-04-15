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

    public function addProduct(Product $product, $quality = 1, Request $request) {
        Cart::add($product, $quality);
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
            'total' => Cart::subtotal(),
        ]);

        foreach (Cart::content() as $item) {
            $order->products()->attach($item->id, [
                'price' => $item->price,
                'quantity' => $item->qty,
            ]);
        }

        # TODO: send email to admin & to customer

        Cart::destroy();

        return redirect()->route('index'); # TODO: successful order message
    }
}
