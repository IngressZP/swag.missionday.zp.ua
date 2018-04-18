<?php

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('order_statuses')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('order_statuses')->insert([
            [
                'title' => 'новый',
            ],
            [
                'title' => 'проверено: ок',
            ],
            [
                'title' => 'ожидается уточнение',
            ],
            [
                'title' => 'отменён',
            ],
            [
                'title' => 'оплачен',
            ],
            [
                'title' => 'отправлено',
            ],
        ]);
    }
}
