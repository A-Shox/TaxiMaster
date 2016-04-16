<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsOfNewOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('new_orders', function (Blueprint $table) {
            $table->renameColumn('start_latitude', 'startLatitude');
            $table->renameColumn('start_longitude', 'startLongitude');
            $table->renameColumn('end_latitude', 'endLatitude');
            $table->renameColumn('end_longitude', 'endLongitude');
            $table->renameColumn('customer_phone', 'customerPhone');
            $table->renameColumn('order_type', 'orderType');
            $table->renameColumn('taxi_driver_user_id', 'taxiDriverUserId');
            $table->renameColumn('taxi_operator_user_id', 'taxiOperatorUserId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('new_orders', function (Blueprint $table) {
            //
        });
    }
}
