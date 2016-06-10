<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLevelPrivilege extends Model
{
    public $timestamps = false;

    public function privileges(){
        return $this->hasMany(Privilege::class, 'privilege_id', 'id');
    }

    public function userLevels(){
        return $this->hasMany(UserLevel::class, 'user_level_id', 'id');
    }
}
