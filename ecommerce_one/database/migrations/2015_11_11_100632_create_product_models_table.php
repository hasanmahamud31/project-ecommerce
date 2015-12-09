<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admin_id',10);
            $table->string('sku',8);
            $table->string('category_id',5);
            $table->string('subcategory_id',5);
            $table->string('product_name',255);
            $table->string('brand_name',255);
            $table->string('product_quantity',5);
            $table->string('product_description');
            $table->float('product_price');            
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
        Schema::drop('product');
    }
}
