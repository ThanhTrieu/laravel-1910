<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInformationProductPropertysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_propertys', function (Blueprint $table) {
            $table->foreign('products_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->foreign('admins_id')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_propertys', function (Blueprint $table) {
            //
        });
    }
}
