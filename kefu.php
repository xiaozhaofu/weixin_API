<?php

include "Http.class.php";  
include "access_token.php";

$url = "https://api.weixin.qq.com/customservice/kfaccount/add?access_token=".get_token();
$json = '{
     "kf_account" : "test1@gh_7fdd4dfe2c6f",
     "nickname" : "客服1",
     "password" : "e10adc3949ba59abbe56e057f20f883e",
}';

$res = Http::post($url,$json);
//$row = json_decode($res);
var_dump($res);