<?php
/**
 * Created by PhpStorm.
 * User: kung
 * Date: 15-3-26
 * Time: 下午2:13
 */
header("Content-type:text/html;chartset=utf-8");
error_reporting(E_ALL);
session_start();
define('ROOT_DIR',dirname(__FILE__));
require ROOT_DIR.'/Simpleline/Simpleline.php';
