<?php
/**
 * @Title ...
 * ---------------------------------------------
 * @File Login.php
 * @Description ...
 *
 * ---------------------------------------------
 * @Author seagm
 * @Date 2019/5/8 14:28
 */

namespace app\index\controller;

use app\admin\model\BrowsersModel;
use app\common\AuthyService;
use app\common\func;
use app\index\model\UserModel;
use think\Controller;
use think\Request;


class Login extends Controller
{
    public function index()
    {
        session_start();
        if (isset($_SESSION['uid']) && $_SESSION['uid'] > 0) {
            return $this->redirect('admin/index/index');
        }
        return $this->fetch();
    }

    public function check()
    {
        $username = Request::instance()->post('username', '');
        $password = Request::instance()->post('password', '');
        $sms = Request::instance()->post('sms', '');
        $remember = Request::instance()->post('remember', '');

        $user = UserModel::get(['email' => $username]);
        if (!$user) {
            return -1;
        }
        $hs_pw = password_hash($password, PASSWORD_BCRYPT);
        if (!password_verify($password, $user['password'])) {
            return -2;
        }
        if (!$user['authy_id']) {
            $authy_id = AuthyService::createUserAuthy($user['email'], $user['mobile']);;
            if (!$authy_id) {
                return -3;
            }
            UserModel::update(['authy_id' => $authy_id], ['id' => $user['id']]);
            return -4;
        }
        if (!$sms) {
            AuthyService::sendSMS($sms);
            return -5;
        } else {
            AuthyService::verifyToken($sms, $user['authy_id']);
        }
        if ($remember) {
            BrowsersModel::record($user['id']);
        }

        return func::setIdentify($user['id']);
    }

    public function login_out()
    {
        session_start();
        if (isset($_SESSION['uid']) && $_SESSION['uid']) {
            unset($_SESSION['uid']);
        }
        return $this->redirect('admin/login/index');
    }

}
