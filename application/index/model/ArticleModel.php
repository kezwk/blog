<?php
/**
 * @Title ...
 * ---------------------------------------------
 * @File ArticleModelel.php
 * @Description ...
 *
 * ---------------------------------------------
 * @Author seagm
 * @Date 2019/5/8 10:42
 */

namespace app\index\model;

use app\common\func;
use think\Db;
use think\Model;

class ArticleModel extends Model
{
    public static function getArticleById($id)
    {
        $data = Db::table('Article')->where('id', $id)->find();
        $data['category'] = func::changeCategory($data['category']);
        return $data;
    }

    public static function getCategory()
    {
        return $data = Db::table('category')->select();
    }

    public static function getArticleByCode($code)
    {
        return Db::table('Article')->alias('a')->join('category c', 'a.category_id = c. id', 'left')
            ->where('c.name', $code)->select();
    }
}