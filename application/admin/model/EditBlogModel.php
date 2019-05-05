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
        $data = Db::table('article')->limit(10)->order('id','desc')->select();
        foreach ($data as &$v) {
            switch ($v['category']) {
                case 0:
                    $v['category'] = 'PHP';
                    break;
                case 1:
                    $v['category'] = 'JS';
                    break;
                case 2:
                    $v['category'] = 'MYSQL';
                    break;
                case 3:
                    $v['category'] = 'LINUX';
                    break;
                case 4:
                    $v['category'] = 'OTHER';
                    break;
            }
            $v['created'] = date('Y-m-d', strtotime($v['created']));
        }
        return $data;
    }
}