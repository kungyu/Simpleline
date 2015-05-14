<?php
/**
 * Created by PhpStorm.
 * User: kung
 * Date: 15-3-26
 * Time: 下午2:41
 */
namespace controller;
use \model\basemodel;
use \view\view;
class basecontroller {
    protected  $model;
    protected  $view;
    function __construct(){
        $this->model = new basemodel();
        $this->view   = new view();
	    $action = getaction();
	}

     public function  __get($var){
        echo 'R U OK?';
        exit;
    }

    public function __call($var1,$var2){
        echo 'U create a function.';
        exit;
    }

    /*
     * 跳转页面
     * @param $dataurl string 'controller.function'
     * */
    public function redirect($dataurl){
        $urlarr = explode('.',$dataurl);
        $reurl = 'index.php?c='.$urlarr[0].'&f='.$urlarr[1];
        header("location:".$reurl);
    }
} 
