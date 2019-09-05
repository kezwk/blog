<?php

namespace app\index\controller;

use app\index\model\IndexModel;
use think\Controller;
use think\Request;

class Index extends Controller
{
    public function index()
    {
        $category_code = Request::instance()->param('category_code');
        if ($category_code) {
            $data = IndexModel::getArticleByCode($category_code);
        } else {
            $data = IndexModel::getAll();
        }

        $category = IndexModel::getCategory();
        $this->assign('data', $data);
        $this->assign('category', $category);
        $this->assign('category_code', $category_code);
        return $this->fetch();
    }

    public function article()
    {
        $id = Request::instance()->param('id');
        $data = IndexModel::getArticleById($id);
        $category = IndexModel::getCategory();
        $this->assign('data', $data);
        $this->assign('category', $category);
        $this->assign('category_code', $data['category_code']);
        return $this->fetch();
    }
}
