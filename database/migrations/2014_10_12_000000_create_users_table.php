<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 20)->unique();
            $table->string('password', 100);
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->string('phone', 15)->unique();
            $table->string('user_type', 10);

            $table->unique(array('first_name', 'last_name'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
