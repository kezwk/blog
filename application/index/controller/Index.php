<?php

namespace app\index\controller;

use think\Controller;
use app\admin\model\EditBlogModel;

class Index extends Controller
{
    public function index()
    {
        $model = new EditBlogModel();
        $data = $model->getArticle();
        $this->assign('data', $data);
        return $this->fetch();
    }

}
