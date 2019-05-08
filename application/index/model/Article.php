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

class Article extends Model
{
    public static function getArticleById($id)
    {
        $data = Db::name('Article')->where('id',$id)->find();
        $data['category'] = func::changeCategory($data['category']);
        return $data;
    }
}