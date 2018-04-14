<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->timestamps();

            $table->unique(['order_id', 'product_id']);
            $table->foreign('order_id')
                ->references('id')->on('orders');
            $table->foreign('product_id')
                ->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_product', function (Blueprint $table) {
            $table->dropIndex(['order_id', 'product_id']);
            $table->dropForeign('order_product_order_id_foreign');
            $table->dropForeign('order_product_product_id_foreign');
        });
        Schema::dropIfExists('order_product');
    }
}
