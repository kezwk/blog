<?php

namespace app\index\controller;

use app\index\model\UserModel;
use think\Controller;

class User extends Controller
{
    public function index()
    {
        return 'user';
    }

    public function getUser()
    {
        $user = new UserModel();
        $data = $user->getUserInfo(1);
        return $this->fetch('index/user', ['data' => $data]);
    }
}