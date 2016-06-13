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
        (new \App\DriverUpdate(['latitude'=>6.798354, 'longitude'=>79.901777, 'stateId'=>2, 'id'=>2]))->save();
        (new \App\DriverUpdate(['latitude'=>6.795540, 'longitude'=>79.894961, 'stateId'=>2, 'id'=>3]))->save();
        (new \App\DriverUpdate(['latitude'=>6.893396, 'longitude'=>79.855470, 'stateId'=>3, 'id'=>4]))->save();

        (new \App\DriverUpdate(['latitude'=>6.833534, 'longitude'=>79.867920, 'stateId'=>2, 'id'=>5]))->save();
        (new \App\DriverUpdate(['latitude'=>6.854157, 'longitude'=>79.861826, 'stateId'=>2, 'id'=>6]))->save();
        (new \App\DriverUpdate(['latitude'=>7.002040, 'longitude'=>79.951345, 'stateId'=>3, 'id'=>7]))->save();
        (new \App\DriverUpdate(['latitude'=>6.912675, 'longitude'=>79.848138, 'stateId'=>4, 'id'=>8]))->save();

        (new \App\DriverUpdate(['latitude'=>6.795970, 'longitude'=>79.940288, 'stateId'=>2, 'id'=>9]))->save();
        (new \App\DriverUpdate(['latitude'=>7.097775, 'longitude'=>79.993086, 'stateId'=>2, 'id'=>10]))->save();
        (new \App\DriverUpdate(['latitude'=>6.850783, 'longitude'=>79.926115, 'stateId'=>4, 'id'=>11]))->save();

        (new \App\DriverUpdate(['latitude'=>0, 'longitude'=>0, 'stateId'=>1, 'id'=>12]))->save();
        (new \App\DriverUpdate(['latitude'=>0, 'longitude'=>0, 'stateId'=>1, 'id'=>13]))->save();
        (new \App\DriverUpdate(['latitude'=>0, 'longitude'=>0, 'stateId'=>1, 'id'=>14]))->save();
        (new \App\DriverUpdate(['latitude'=>0, 'longitude'=>0, 'stateId'=>1, 'id'=>15]))->save();
    }
}
