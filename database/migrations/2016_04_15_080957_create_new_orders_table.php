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
            $table->double('start_latitude', 8, 6);
            $table->double('start_longitude', 9, 6);
            $table->double('end_latitude', 8, 6);
            $table->double('end_longitude', 9, 6);
            $table->timestamp('time');
            $table->string('customer_phone', 15);
            $table->string('order_type', 10);
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
