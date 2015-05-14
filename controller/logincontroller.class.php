<?php
/**
 * Created by PhpStorm.
 * User: kung
 * Date: 15-3-30
 * Time: 下午2:36
 */

namespace controller;
use \controller\basecontroller;

class logincontroller extends basecontroller {

    /*
     * 登录展示页面
     * */
    public function index(){
		$data['url'] = $this->model->getserver();
		$data['user']= $this->model->getuser();
		$this->view->display('login',$data);
    }

    
}
