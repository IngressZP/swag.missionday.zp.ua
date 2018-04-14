<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::orderBy('created_at', 'desc')->get();

        return view('admin.orders.list', [
            'orders' => $orders,
        ]);
    }

    public function adminView(Order $order) {
        return view('admin.orders.adminView', [
            'order' => $order,
        ]);
    }

    public function delete(Order $order) {
        $order->delete();

        return redirect()->route('admin.orders.list');
    }
}
