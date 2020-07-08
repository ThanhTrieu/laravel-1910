<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brands_id')->unsigned();
            $table->string('name_product',200);
            $table->string('slug_product',250);
            $table->integer('price_product')->nullable();
            $table->string('image_product', 150);
            $table->integer('qty_product');
            $table->tinyInteger('status_product')->default(1);
            $table->integer('view_product')->nullable();
            $table->integer('sale_off')->nullable();
            $table->tinyInteger('hot_product')->nullable();
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
        Schema::dropIfExists('products');
    }
}
