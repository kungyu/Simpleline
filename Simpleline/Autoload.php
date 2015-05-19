<?php
/**
 * Created by PhpStorm.
 * User: kung
 * Date: 15-5-14
 * Time: 下午2:20
 */

namespace Simpleline;


class Autoload {

    private static $cobject = NULL;

    public static function instance(){
        if(!self::$cobject)
            self::$cobject = new self;
        return self::$cobject;
    }

    public function autoReg(){
        spl_autoload_register(array($this,'loadClass'));
    }

    public function loadClass($className){
        $filepath = $this->getPath($className);
        $this->requireFile($filepath);
    }

    public function getPath($fileName){
    	$fileName = str_replace('\\','/',$fileName);
        return '/'.$fileName.'.class.php';
    }

    public function requireFile($path){
        $truePath = ROOT_DIR.$path;
        if(is_file($truePath))
            require $truePath;

    }

} 
