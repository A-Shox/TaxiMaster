<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsOfTaxisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taxis', function (Blueprint $table) {
            $table->renameColumn('registered_no', 'registeredNo');
            $table->renameColumn('no_of_seats', 'noOfSeats');
            $table->renameColumn('taxi_type_id', 'taxiTypeId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taxis', function (Blueprint $table) {
            //
        });
    }
}
