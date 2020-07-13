<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_order',20);
            $table->dateTime('order_date');
            $table->dateTime('ship_date')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('order_qty')->unsigned();
            $table->integer('money')->unsigned();
            $table->string('ship_adress',200);
            $table->text('note')->nullable();
            $table->tinyInteger('payment_type')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
