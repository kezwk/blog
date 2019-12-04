<?php

namespace app\admin\model;

use think\Model;
use think\Db;

class BrowsersModel extends Model
{
    protected $table = 'browsers';

    public static function record($user_id)
    {
        $result = Db::table('browsers')->insert([
                'user_id' => $user_id,
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                'accept_lang' => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
                'last_visit_time' => time(),
                'last_remember_time' => time()]
        );
        if ($result) return true;

    }
}