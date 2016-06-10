<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    public $timestamps = false;

    public function privilegeIds(){
        return $this->hasMany(UserLevelPrivilege::class, 'id', 'user_level_id');
    }
}
