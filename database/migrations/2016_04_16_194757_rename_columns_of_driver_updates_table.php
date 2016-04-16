<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsOfDriverUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('driver_updates', function (Blueprint $table) {
            $table->renameColumn('updated_at', 'updatedAt');;
            $table->renameColumn('state_id', 'stateId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('driver_updates', function (Blueprint $table) {
            //
        });
    }
}
