<?php

use Illuminate\Database\Seeder;

class PrivilegesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\Privilege(['name'=>'Dashboard']))->save();
        (new \App\Privilege(['name'=>'New Hire']))->save();
        (new \App\Privilege(['name'=>'On Going Orders']))->save();
        (new \App\Privilege(['name'=>'Order History']))->save();
        (new \App\Privilege(['name'=>'New Account']))->save();
        (new \App\Privilege(['name'=>'View Accounts']))->save();
        (new \App\Privilege(['name'=>'New Taxi']))->save();
        (new \App\Privilege(['name'=>'View Taxi']))->save();
    }
}
