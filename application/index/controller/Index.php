<?php

namespace app\index\controller;

use app\index\model\IndexModel;
use cebe\markdown\Markdown;
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
//        $parser = new Markdown();
//        echo $parser->parse($data['markdown_code']);die;
//        echo $data['markdown_code'];
        $category = IndexModel::getCategory();
        $this->assign('data', $data);
        $this->assign('category', $category);
        $this->assign('category_code', $data['category_code']);
        return $this->fetch();
    }
}
