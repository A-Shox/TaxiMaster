<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUserLevelPrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_level_privileges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_level_id');
            $table->integer('privilege_id');
            $table->unique(array('user_level_id', 'privilege_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_level_privileges');
    }
}
