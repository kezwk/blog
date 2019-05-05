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

use app\admin\model\EditBlogModel;
use think\Controller;
use think\Db;
use \think\Request;

class Index extends Controller
{
    public function index()
    {
        if ($id = Request::instance()->param('id')) {
            $data = Db::table('article')->where('id', $id)->find();
            $this->assign('data',$data);
       }
        return $this->fetch();
    }

    public function addBlog()
    {
        $request = Request::instance()->param();
        $data = [
            'title' => $request['title'],
            'category' => $request['category'],
            'visitable' => isset($request['switch']) ? 1 : 0,
            'content' => $request['editormd-html-code'],
            'created' => DATE
        ];
        $res = Db::table('article')->insert($data);
        if ($res) {
            return ['data' => $request, 'success' => true];
        }
    }

    public function editBlog()
    {
        $editBlog = new EditBlogModel();
        $data = $editBlog->getArticle();
        $this->assign('data', $data);
        return $this->fetch();
    }
}