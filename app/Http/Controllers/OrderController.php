<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::orderBy('created_at', 'desc')->get();
        $statuses = OrderStatus::all();

        return view('admin.orders.list', [
            'orders' => $orders,
            'statuses' => $statuses,
        ]);
    }

    public function adminView(Order $order) {
        $statuses = OrderStatus::all();

        return view('admin.orders.adminView', [
            'order' => $order,
            'statuses' => $statuses,
        ]);
    }

    public function updateStatus(Order $order, Request $request) {
        $orderStatus = OrderStatus::find($request->get('order_status'));

        if ($orderStatus) {
            $order->order_status_id = $orderStatus->id;
            $order->save();
            $status = 'OK';
        } else {
            $status = 'ERROR';
        }

        if ($request->ajax()) {
            return response()->json([
                'status' => $status,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function delete(Order $order) {
        $order->delete();

        return redirect()->route('admin.orders.list');
    }
}
