<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('orders')->truncate();
        DB::table('order_product')->truncate();
        Schema::enableForeignKeyConstraints();

        $products = Product::all();

        factory(Order::class, 10)->create()->each(function ($order) use ($products) {
            $prods = $products->shuffle()->take(rand(4,8));
            $sum = 0;

            foreach ($prods as $prod) {
                $order->products()->save($prod, ['price' => $prod->price, 'quantity' => rand(1, 5)]);
                $sum += $prod->price;
            }

            $order->total = $sum;
            $order->save();
        });
    }
}
