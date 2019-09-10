<?php

namespace app\admin\controller;

use app\admin\model\CategoryModel;
use think\Controller;
use think\Request;
use think\Validate;

class Category extends Controller
{
    public function index()
    {
        if ($id = Request::instance()->param('id')) {
            $data = CategoryModel::getCategoryById($id);
            $this->assign('data', $data);
        }
        return $this->fetch();
    }

    public function addCategory()
    {
        $request = Request::instance()->param();
        $validate = new Validate([
            'title' => 'require|max:20',
            'code' => 'require|max:10'
        ]);
        if (!$validate->check($request)) {
            dump($validate->getError());
        }
        $data = [
            'name' => $request['title'],
            'code' => $request['code'],
            'created' => time()
        ];
        $result = CategoryModel::addCategory($data);
        if ($result) {
            return ['success' => true];
        }
    }

    public function editCategory()
    {
        $data = CategoryModel::getCategory();
        foreach ($data as &$item) {
            $item['created'] = date('Y-m-d H:i:s', $item['created']);
        }
        unset($item);
        $this->assign('data', $data);
        return $this->fetch();
    }

    public function deleteCategory()
    {
        $id = Request::instance()->param('id');
        $result = CategoryModel::deleteCategory($id);
        if ($result) {
            return ['success' => true];
        }
    }
}