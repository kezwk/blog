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
            ->order('created', 'desc')
            ->where('a.id', $id)
            ->limit(15)
            ->find();
        $data['created'] = date('Y-m-d H:i:s', $data['created']);
        if ($data['update']) {
            $data['update'] = date('Y-m-d H:i:s', $data['update']);
        }
        return $data;
    }

    public static function getCategory()
    {
        return Db::table('category')->field('id,name,code category_code')->where('deleted','1')->select();
    }

    public static function countCategory()
    {
        return Db::table('article')->alias('a')
            ->field('c.id,c.name,count(c.id) as count')
            ->join('category c', 'c.id = a.category_id', 'left')
            ->where('a.deleted',1)
            ->select();
    }

    public static function getArticleByCode($code)
    {
        $data = Db::table('Article')->alias('a')
            ->field('a.*,c.name,c.code category_code')
            ->join('category c', 'a.category_id = c. id', 'left')
            ->where('c.name', $code)
            ->where('a.deleted',1)
            ->order('created', 'desc')
            ->select();
        foreach ($data as &$v) {
            $v['content'] = substr(strip_tags($v['content']), 0, 600);
            $v['created'] = date('Y-m-d H:i:s', $v['created']);
        }
        unset($v);
        return $data;
    }

    public static function getAll()
    {
        $data = Db::table('Article')
            ->where('deleted', 1)
            ->where('visitable', 1)
            ->limit(15)
            ->order('created', 'desc')
            ->select();
        foreach ($data as &$v) {
            $v['content'] = substr(strip_tags($v['content']), 0, 600);
            $v['created'] = date('Y-m-d H:i:s', $v['created']);
        }
        unset($v);
        return $data;
    }
}