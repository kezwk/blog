<?php

namespace app\index\model;

use think\Db;
use think\Model;

class UserModel extends Model
{
    public function getUserInfo()
    {
        $user = Db::table('user')->where('id', 1)->select();
        return $user;
    }
}