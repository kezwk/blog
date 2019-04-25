<?php
/**
 * @Title ...
 * ---------------------------------------------
 * @File ArticleDetail.php
 * @Description ...
 *
 * ---------------------------------------------
 * @Author seagm
 * @Date 2019/4/25 15:58
 */

namespace app\index\controller;

use think\Controller;
use think\Request;

class ArticleDetail extends Controller
{
    public function index($id)
    {
        return $this->fetch();
    }
}