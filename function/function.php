<?php
/**
 * Created by PhpStorm.
 * User: kung
 * Date: 15-3-26
 * Time: 下午2:27
 */

/*
 * CURL操作获取http接口数据
 * @param url 请求的HTTP接口地址
 * @param timeout curl超时设置
 * return string json格式字符串*/
function curl_get_contents($url,$timeout=30) {
    $curlHandle = curl_init();
    curl_setopt( $curlHandle , CURLOPT_URL, $url );
    curl_setopt( $curlHandle , CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $curlHandle , CURLOPT_TIMEOUT, $timeout );
    $result = curl_exec( $curlHandle );
    curl_close( $curlHandle );
    return $result;
}

/*
 * 全局获取变量
 * @param $data string "post.id"
 * */
function I($data){
    global $urldata;
    $dataarr = explode('.',$data);
    return  isset($urldata[$dataarr[0]][$dataarr[1]]) ? $urldata[$dataarr[0]][$dataarr[1]] : '';
}

/*
 * 获取配置变量
 * @param  $ckey 配置参数键值
 * @param  $config 预定义引入配置参数变量
 * @return string or array
 * */
function C($ckey,$config = ''){
    require ROOT_DIR."/config/config.php";
    if(isset($config[$ckey]))
   	$result =  $config[$ckey];
    else
	$result = false;
    return $result;
}

/*
 * 获取$action的值
 * @param string $action 全局变量
 * @return string
 * */
function getaction(){
	global $action;
	return $action;
}

/*
 * 执行sh脚本共用函数
 * @param $execsh string 需要执行的shell脚本
 * @param $setarr array  往shell脚本中传递的参数
 * @return bool
 * */
 function actsh($execsh = '', $setarr = array()){
     $setstr  = implode(' ',$setarr);
     $execstr = $execsh.$setstr;
     exec($execstr, $res_arr, $res_status);
     if($res_status == 0 && count($setarr) == 0){
        return $res_arr; 
     }elseif($res_status == 0 && count($setarr) != 0){
        return true;
     }else{
        return false;
     }
 }

/*
 * 模拟用户登录
 * @param $url string 提交数据地址
 * @param $cookie filepath cookie文件存放地址
 * @param $post array 提交数据内容
 * @reutrn no
 * */
function login_post($url, $cookie, $post){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);
    curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
    curl_exec($curl);
    curl_close($curl);
}

/*
 * 模拟登录成功之后获取页面数据
 * @param $url 需要获取信息的页面
 * @param $cookie 模拟登录过程中存放的cookie文件地址
 * @return $rs object
 * */
function get_content($url,$cookie){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEFILE,$cookie);
    $rs = curl_exec($ch);
    curl_close($ch);
    return $rs;
}
