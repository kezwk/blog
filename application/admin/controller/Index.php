<?php
/**
 * @Title ...
 * ---------------------------------------------
 * @File Index.php
 * @Description ...
 *
 * ---------------------------------------------
 * @Author seagm
 * @Date 2019/4/25 17:41
 */

namespace app\admin\controller;

use think\Controller;
use think\Db;
use \think\Request;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function addBlog()
    {
        $request = Request::instance()->param();
        $data = [
            'title' => $request['title'],
            'category' => $request['category'] ,
            'visitable' => isset($request['switch']) ? 1 : 0,
            'content' => $request['editormd-html-code'],
            'created' => DATE
        ];
        $res = Db::table('content')->insert($data);
        if ($res) {
            return ['data' => $request, 'success' => true];
        }
    }
}