<?php
/**
 * Created by PhpStorm.
 * User: kung
 * Date: 15-3-26
 * Time: 下午2:13
 */
error_reporting(E_ALL);
session_start();
define('ROOT_DIR',dirname(__FILE__));
$action   = isset($_GET['c'])?$_GET['c']:'';
$func     = isset($_GET['f'])?$_GET['f']:'';
if($action == ''||$func == ''){
    $action = 'login';
    $func   = 'index';
}
if(isset($_POST)){
    foreach($_POST as $key => $val){
        $urldata['post'][$key] = htmlspecialchars(strip_tags($val));
    }
}
if(isset($_GET)){
    foreach($_GET as $key => $val){
        $urldata['get'][$key] = htmlspecialchars(strip_tags($val));
    }
}
include_once(ROOT_DIR."/config/config.php");
include_once(ROOT_DIR."/function/function.php");
require ROOT_DIR.'/streamline/Autoload.php';
\streamline\Autoload::instance()->autoReg();
$controllerName = '\controller\\'.$action.'controller';
$controller = new  $controllerName();
$controller->$func();
