<?php

namespace app\index\controller;

use app\index\model\ArticleModel;
use think\Controller;
use app\admin\model\EditBlogModel;

class Index extends Controller
{
    public function index()
    {
        $model = new EditBlogModel();
        $data = $model->getArticle();
        $category = ArticleModel::getCategory();
        $this->assign('data', $data);
        $this->assign('category', $category);
        return $this->fetch();
    }

//    public function base()
//    {
//        return $this->fetch('public/index');
//    }

}
