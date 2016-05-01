<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->double('startLatitude', 8, 6);
            $table->double('startLongitude', 9, 6);
            $table->double('endLatitude', 8, 6);
            $table->double('endLongitude', 9, 6);
            $table->timestamp('time');
            $table->string('customerPhone', 15);
            $table->string('orderType', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('new_orders');
    }
}
