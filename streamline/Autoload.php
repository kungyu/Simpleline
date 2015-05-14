<?php
/**
 * Created by PhpStorm.
 * User: kung
 * Date: 15-5-14
 * Time: 下午2:20
 */

namespace streamline;


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
        $file_arr = explode('\\',$className);
        $fileName = array_pop($file_arr);
        if(strpos($fileName,'controller') > 0){
            $file = '\\controller\\'.$fileName.'.class.php';
        }
        if(strpos($fileName,'model') > 0){
            $file = '\\model\\'.$fileName.'.model.php';
        }
        if($fileName == 'view')
            $file = '\\view\\view.class.php';
        $filepath = str_replace('\\','/',$file);
        require ROOT_DIR.$filepath;

    }

} 