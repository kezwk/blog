<?php
namespace app\index\controller;

use app\index\model\ArticleModel;
use think\Controller;
use think\Request;
use think\Route;

class Article extends Controller
{
    public function index()
    {
        $id = Request::instance()->param('id');
        $data = ArticleModel::getArticleById($id);
        $this->assign('data', $data);
        return $this->fetch();
    }

    public function category()
    {
       $category_code = Request::instance()->param('cate_code');
       if ($category_code){
           $data = ArticleModel::getArticleByCode($category_code);
           $this->assign('data',$data);
           return $this->fetch();
       }
    }
}