<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->string('product_image');
            $table->text('product_description');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('price');
            $table->string('old_price');
            $table->tinyInteger('feature_product');
            $table->tinyInteger('special_offer');
            $table->string('new_arrival');
            $table->string('sku');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('product');
    }
}
