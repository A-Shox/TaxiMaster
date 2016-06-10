<?php

use Illuminate\Database\Seeder;

class UserLevelsPrivilegesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\UserLevelPrivilege(['user_level_id'=>1, 'privilege_id'=>1]))->save();
        (new \App\UserLevelPrivilege(['user_level_id'=>1, 'privilege_id'=>3]))->save();
        (new \App\UserLevelPrivilege(['user_level_id'=>1, 'privilege_id'=>4]))->save();
        (new \App\UserLevelPrivilege(['user_level_id'=>1, 'privilege_id'=>5]))->save();
        (new \App\UserLevelPrivilege(['user_level_id'=>1, 'privilege_id'=>6]))->save();
        (new \App\UserLevelPrivilege(['user_level_id'=>1, 'privilege_id'=>7]))->save();
        (new \App\UserLevelPrivilege(['user_level_id'=>1, 'privilege_id'=>8]))->save();
        (new \App\UserLevelPrivilege(['user_level_id'=>3, 'privilege_id'=>1]))->save();
        (new \App\UserLevelPrivilege(['user_level_id'=>3, 'privilege_id'=>2]))->save();
        (new \App\UserLevelPrivilege(['user_level_id'=>3, 'privilege_id'=>3]))->save();
        (new \App\UserLevelPrivilege(['user_level_id'=>3, 'privilege_id'=>4]))->save();
        (new \App\UserLevelPrivilege(['user_level_id'=>3, 'privilege_id'=>8]))->save();

    }
}
