<?php

use Illuminate\Database\Seeder;

class DriverUpdatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\DriverUpdate(['latitude'=>0, 'longitude'=>0, 'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(), 'stateId'=>1, 'id'=>2]))->save();
        (new \App\DriverUpdate(['latitude'=>0, 'longitude'=>0, 'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(), 'stateId'=>1, 'id'=>3]))->save();
    }
}
