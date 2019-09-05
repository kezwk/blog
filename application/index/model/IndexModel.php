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

use think\Db;
use think\Model;

class IndexModel extends Model
{
    public static function getArticleById($id)
    {
        $data = Db::table('Article')->alias('a')
            ->field('a.*,c.name category_name,c.code category_code')
            ->join('category c', 'a.category_id = c.id', 'left')
            ->where('a.id', $id)->find();
        return $data;
    }

    public static function getCategory()
    {
        return  Db::table('category')->field('name , code category_code')->select();
    }

    public static function getArticleByCode($code)
    {
        $data = Db::table('Article')->field('a.*,c.name,c.code category_code')->alias('a')->join('category c', 'a.category_id = c. id', 'left')
            ->where('c.name', $code)->select();
        foreach ($data as &$v) {
            $v['content'] = substr(strip_tags($v['content']), 0, 600);
            $v['visitable'] = $v['visitable'] == 0 ? 'false' : 'true';
        }
        return $data;
    }

    public static function getAll()
    {
        $data = Db::table('Article')->limit(15)->order('id', 'desc')->select();
        foreach ($data as &$v) {
            $v['content'] = substr(strip_tags($v['content']), 0, 600);
            $v['visitable'] = $v['visitable'] == 0 ? 'false' : 'true';
        }
        return $data;
    }
}