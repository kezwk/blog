<?php

namespace app\admin\controller;

use think\Controller;


class Base extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkSession();
    }

    public function checkSession()
    {
        session_start();
        if (isset($_SESSION['uid']) && $_SESSION['uid']) {
            return true;
        } else {
            return $this->redirect('index/login/index');
        }
    }

}