<?php
include "Http.class.php";
include "access_token.php";
 
function longcode(){
$url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=".get_token();  
 
$json = '{
	"action_name": "QR_LIMIT_SCENE", 
	"action_info": {"scene": {"scene_str": "www.baidu.com"}}
	}';  

//curl实现post请求    
$ret = Http::post($url,$json);  
$row = json_decode($ret,true);//对JSON格式的字符串进行编码 
//var_dump($row['ticket']);

$ticket =urlencode( $row['ticket']);

$res = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=".$ticket;
return $res;
}


function shortcode(){
	$res = longcode();
	$url = "https://api.weixin.qq.com/cgi-bin/shorturl?access_token=".get_token();
	$json = '{
		"action":"long2short",
		"long_url":"'.$res.'"
		}';

	$ret = Http::post($url,$json);  
	$row = json_decode($ret,true);
	return $row['short_url'];

}
$scode = shortcode();
var_dump($scode);