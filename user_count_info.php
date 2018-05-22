<?php  
 
include "Http.class.php";  
include "access_token.php";  
  
/* 获取注册公众号的用户的列表 */
//url 里面的需要1个参数一个 access_token   
//$url = "https://api.weixin.qq.com/cgi-bin/user/get?access_token=".get_token()."&next_openid=";  
  
$url = "https://api.weixin.qq.com/datacube/getusercumulate?access_token=".get_token();  

//采用官方给的‘调用示例’格式
$json = '{ 
    "begin_date": "2017-11-05", 
    "end_date": "2017-11-08"
}';

//curl实现post请求 
$ret = Http::post($url,$json);  
$row = json_decode($ret);//对JSON格式的字符串进行编码  

var_dump($row);	//得到此图文素材的url



 