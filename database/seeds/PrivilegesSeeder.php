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
        (new \App\UserLevelPrivilege(['name'=>'Dashboard']))->save();
        (new \App\UserLevelPrivilege(['name'=>'New Hire']))->save();
        (new \App\UserLevelPrivilege(['name'=>'On Going Orders']))->save();
        (new \App\UserLevelPrivilege(['name'=>'Order History']))->save();
        (new \App\UserLevelPrivilege(['name'=>'New Account']))->save();
        (new \App\UserLevelPrivilege(['name'=>'View Accounts']))->save();
        (new \App\UserLevelPrivilege(['name'=>'New Taxi']))->save();
        (new \App\UserLevelPrivilege(['name'=>'View Taxi']))->save();
    }
}
