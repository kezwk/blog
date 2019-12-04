<?php
/**
 * @Title ...
 * ---------------------------------------------
 * @File func.php
 * @Description ...
 *
 * ---------------------------------------------
 * @Author seagm
 * @Date 2019/5/8 11:32
 */

namespace app\common;

use app\index\model\UserModel;

class func
{
    public static function setIdentify($uid)
    {
        $uid = intval($uid);
        self::update_user_last_visit($uid);
        session_start();
        $_SESSION['uid'] = $uid;
        self::update_sessid($uid);
        return isset($_SESSION['uid']) ? $_SESSION['uid'] : null;
    }

    public static function update_user_last_visit($uid)
    {
        UserModel::update(['id' => $uid, 'last_visit' => time(), 'ip_address' => ip2long($_SERVER["REMOTE_ADDR"])]);
    }

    public static function update_sessid($uid)
    {
        UserModel::update(['id' => $uid, 'sess_id' => session_id()]);
    }
}
