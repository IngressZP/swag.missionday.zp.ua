<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use App\Models\Product;
use Illuminate\Http\Request;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;


class ExportController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show() {
        return view('admin.export');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     */
    public function exportByQuantity() {
        $filename = date("Y-m-d_H-i-s") . "_swagshop_zp.xlsx";
        $headers = [
            "Content-type" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $writer = WriterFactory::create(Type::XLSX);
        $products = Product::all();
        $cancelled = OrderStatus::where('title', 'отменён')->firstOrFail();

        $callback = function () use ($products, $cancelled, $writer) {
            $writer->openToFile('php://output');

            $writer->addRow(["Название", "Цена", "Количество", "Сумма"]);

            foreach ($products as $product) {
                $row = [];

                $row[] = $product->name;
                $row[] = $product->price;

                $num = 0;
                foreach ($product->orders as $order) {
                    if ($order->order_status->id !== $cancelled->id) {
                        $num += $order->pivot->quantity;
                    }
                }

                $row[] = $num;
                $row[] = $num * $product->price;

                $writer->addRow($row);
            }

            $writer->close();
        };

        return response()->stream($callback, 200, $headers);
    }
}
