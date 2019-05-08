<?php
/**
 * @Title ...
 * ---------------------------------------------
 * @File Login.php
 * @Description ...
 *
 * ---------------------------------------------
 * @Author seagm
 * @Date 2019/5/8 14:28
 */
namespace app\admin\controller;

use think\Controller;


class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

}
