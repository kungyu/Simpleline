<?php
/**
 * Created by PhpStorm.
 * User: kung
 * Date: 15-5-15
 * Time: 上午11:13
 */

require ROOT_DIR."/config/config.php" ;
require ROOT_DIR."/function/function.php" ;
require ROOT_DIR.'/Simpleline/Autoload.php';
\Simpleline\Autoload::instance()->autoReg();

$action   = isset($_GET['c'])?$_GET['c']:'';
$func     = isset($_GET['f'])?$_GET['f']:'';
if($action == ''||$func == ''){
    $action = $config['default']['class'] ? $config['default']['class'] : 'login';
    $func   = $config['default']['method'] ? $config['default']['method'] : 'index';
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
$controllerName = '\controller\\'.$action.'controller';
if(class_exists($controllerName))
    $controller = new  $controllerName();
else
    exit('Thte class doesn`t exists.');
if(method_exists($controller,$func))
    $controller->$func();
else
    exit('the function don`t exists.');
