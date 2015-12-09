<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('email', 120)->unique();
            $table->string('password', 120);            
            $table->integer('access_level');
            $table->tinyInteger('status', $autoIncrement = FALSE, $unsigned = true)->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

//        DB::table('users')->insert(array(
//            'email' => 'admin@admin.com',
//            'password' => bcrypt('123456'),
//            'user_id' => '0',
//            'admin_access_level' => '12',
//        ));
//
//        for ($i = 2; $i <= 10; $i++) {
//            DB::table('users')->insert(array(
//                'email' => 'admin' . $i . '@admin.com',
//                'password' => bcrypt('123456'),
//                'user_id' => '0',
//                'admin_access_level' => '12',
//            ));
//        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }

}
