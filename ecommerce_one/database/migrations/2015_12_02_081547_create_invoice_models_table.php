<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('access_level');
            $table->integer('product_id');
            $table->integer('receive_quantity');
            $table->integer('admin_id');
            $table->string('comment',50)->default('null');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('delation_status');
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
        Schema::drop('invoice');
    }
}
