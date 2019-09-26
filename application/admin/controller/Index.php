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
use think\Validate;

class Index extends Controller
{
    public function index()
    {
        if ($id = Request::instance()->param('id')) {
            $data = Db::table('article')->where('id', $id)->find();
            $this->assign('data', $data);
        }
        $category = Db::table('category')->select();
        $this->assign('cate', $category);
        return $this->fetch();
    }

    public function addBlog()
    {
        $request = Request::instance()->param();
        $validate = new Validate([
            'title' => 'require|max:30',
            'category_id' => 'int',
            'editormd-html-code' => 'require',
            'editormd-markdown-doc' => 'require',
        ]);

        if (!$validate->check($request)) {
            dump($validate->getError());
            return ['success' => false];
        }
        $data = [
            'title' => $request['title'],
            'category_id' => $request['category'],
            'visitable' => isset($request['switch']) ? 1 : 0,
            'content' => $request['editormd-html-code'],
            'markdown_code' => $request['editormd-markdown-doc']
        ];
        if (isset($request['id'])) {
            $data['update'] = time();
            $res = Db::table('article')->where('id', $request['id'])->update($data);
        } else {
            $data['created'] = time();
            $res = Db::table('article')->insert($data);
        }
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

    public function deleteBlog()
    {
        $id = Request::instance()->param('id');
//        $result = Db::table('article')->delete($id);
        $result = Db::table('article')->where('id', $id)->update(['deleted' => 0]);
        if ($result) {
            return ['success' => true];
        }
    }
}