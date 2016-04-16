<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsOfFinishedOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('finished_orders', function (Blueprint $table) {
            $table->renameColumn('start_time', 'startTime');
            $table->renameColumn('end_time', 'endTime');
            $table->renameColumn('start_location', 'startLocation');
            $table->renameColumn('end_location', 'endLocation');
            $table->renameColumn('customer_phone', 'customerPhone');
            $table->renameColumn('order_type', 'orderType');
            $table->renameColumn('taxi_driver_user_id', 'taxiDriverUserId');
            $table->renameColumn('taxi_id', 'taxiId');
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
        Schema::table('finished_orders', function (Blueprint $table) {
            //
        });
    }
}
