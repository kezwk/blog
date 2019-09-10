<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class CategoryModel extends Model
{
    public static function addCategory($data)
    {
        Db::table('category')->insert($data);
        if (Db::table('category')->getLastInsID()) {
            return true;
        }
    }

    public static function getCategory()
    {
        $data = Db::table('category')
            ->limit(15)
            ->where('deleted', '1')
            ->order('created')
            ->select();
        return $data;
    }

    public static function deleteCategory($id)
    {
        $result = Db::table('category')->where('id', $id)->update(['deleted' => 0]);
        if ($result) {
            return true;
        }
    }

    public static function getCategoryById($id)
    {
        return Db::table('category')->where('id',$id)->find();
    }
}