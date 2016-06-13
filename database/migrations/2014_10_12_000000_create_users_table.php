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
            $table->string('firstName', 45);
            $table->string('lastName', 45);
            $table->string('phone', 15)->unique();
            $table->integer('userLevelId')->unsigned();
            $table->boolean('isActive')->default(1);

            $table->unique(array('firstName', 'lastName'));
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
