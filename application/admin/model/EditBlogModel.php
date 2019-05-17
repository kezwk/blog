<?php
/**
 * @Title ...
 * ---------------------------------------------
 * @File EditBlogModel.php
 * @Description ...
 *
 * ---------------------------------------------
 * @Author seagm
 * @Date 2019/5/5 16:28
 */

namespace app\admin\model;

use app\common\func;
use think\Db;
use think\Model;

class EditBlogModel extends Model
{
    public function getArticle()
    {
        $data = Db::table('article')->limit(15)->order('id', 'desc')->select();
        foreach ($data as &$v) {
            $v['category'] = func::changeCategory($v['category']);
//            $v['created'] = date('Y-m-d', strtotime($v['created']));
//            if (strpos($v['content'], '<br>')) {
//                $v['content'] = substr($v['content'], 0, strpos($v['content'], '<br>'));
//            } elseif (strpos($v['content'], '<pre>')) {
//                $v['content'] = substr($v['content'], 0, strpos($v['content'], '<pre>'));
//            } else {
//                $v['content'] = substr($v['content'], 0, 100);
//            }
            $v['visitable'] = $v['visitable'] == 0 ? 'false' : 'true';
        }
        return $data;
    }
}