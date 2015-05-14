<?php
/**
 * Created by PhpStorm.
 * User: kung
 * Date: 15-3-26
 * Time: 下午4:36
 */
namespace view;
class view {

    protected $template;
    protected $ext;

    function __construct(){
        $this->template = ROOT_DIR.'/template/';
        $this->ext      = '.php';
    }

    function display($temdir = '',$data = ''){
        if(is_array($data))
            extract($data);
        $tempath = $this->template.$temdir.$this->ext;
        include_once($tempath);
    }
} 