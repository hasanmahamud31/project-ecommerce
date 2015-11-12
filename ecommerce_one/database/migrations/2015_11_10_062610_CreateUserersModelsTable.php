<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserersModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->string('name',120);
            $table->string('mobile',20);           
            $table->text('present_address');
            $table->string('image',120);
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
       Schema::drop('customer');
    }
}
