<?php
/**
 * Created by PhpStorm.
 * User: kung
 * Date: 15-3-26
 * Time: 下午3:44
 * 登录管理员获取数据
 */
namespace model;
class basemodel {

    private $host;
    private $port;
    private $serverurl;
    

    function __construct(){
        $server = C('server');
        $this->host = $server['host'];
        $this->port = $server['port'];
        $this->serverurl = "http://".$server['host'].":".$server['port']."/";
    }
	
    function getserver(){
        return $this->host;
    }
    function getuser(){
        return array('id'=>1,'name'=>'kung','age'=>24);
    }


} 
