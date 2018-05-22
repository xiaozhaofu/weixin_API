<?php  
 
include "Http.class.php";  
include "access_token.php";  
  
/* 获取每一个用户openid列表 */  
//url 里面的需要1个参数一个 access_token   
$url = "https://api.weixin.qq.com/cgi-bin/user/get?access_token=".get_token()."&next_openid=";  

//采用官方给的‘调用示例’格式

//curl实现post请求 
$ret = Http::post($url,'');  
$row = json_decode($ret,true);//对JSON格式的字符串进行编码  

//var_dump($row['data']['openid']);

/**********每一位关注公众号的用户信息*************/

foreach($row['data']['openid'] as $v){
	$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".get_token()."&openid=".$v."&lang=zh_CN";  

//采用官方给的‘调用示例’格式


//curl实现post请求 
$ret = Http::post($url,'');  
$row = json_decode($ret,true);//对JSON格式的字符串进行编码  

var_dump($row);

}



 