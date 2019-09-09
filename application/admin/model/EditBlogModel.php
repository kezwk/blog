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
        $data = Db::table('article')
            ->alias('a')
            ->field('a.*,c.name as category_name')
            ->join('category c', 'c.id = a.category_id', 'left')
            ->order('a.created', 'desc')
            ->limit(15)
            ->select();
        foreach ($data as &$v) {
            $v['content'] = substr(strip_tags($v['content']), 0, 200);
            $v['created'] = date('Y-m-d H:i:s', $v['created']);
            if ($v['update']){
                $v['update'] = date('Y-m-d H:i:s', $v['update']);
            }
            $v['visitable'] = $v['visitable'] == 0 ? 'False' : 'True';
        }
        unset($v);
        return $data;
    }
}