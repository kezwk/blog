<?php
/**
 * @Title ...
 * ---------------------------------------------
 * @File Index.php
 * @Description ...
 *
 * ---------------------------------------------
 * @Author seagm
 * @Date 2019/4/25 17:41
 */

namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}