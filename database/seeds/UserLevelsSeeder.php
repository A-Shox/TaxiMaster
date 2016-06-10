<?php

use Illuminate\Database\Seeder;

class UserLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\UserLevel(['name'=>'Admin']))->save();
        (new \App\UserLevel(['name'=>'Driver']))->save();
        (new \App\UserLevel(['name'=>'Taxi Operator']))->save();
    }
}
