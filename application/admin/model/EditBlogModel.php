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

use think\Db;
use think\Model;

class EditBlogModel extends Model
{
    public function getArticle()
    {
        $data = Db::table('article')->limit(15)->order('id', 'desc')->select();
        foreach ($data as &$v) {
            $v['content'] = substr(strip_tags($v['content']),0,600) ;
            $v['visitable'] = $v['visitable'] == 0 ? 'false' : 'true';
        }
        return $data;
    }
}