<?php
/*
 * 客服一对一发送消息
 */
include "Http.class.php";
include "access_token.php";
$access_token = get_token();
//$openid = "oDVmS1XyS0lIsKOLt_QS_5c6D0pY";
// $openid = "oDVmS1XyS0lIsKOLt_QS_5c6D0pY";

$url = "https://api.weixin.qq.com/cgi-bin/user/get?access_token=".get_token()."&next_openid=";

//采用官方给的‘调用示例’格式

//curl实现post请求
$ret = Http::post($url,'');
$row = json_decode($ret,true);//对JSON格式的字符串进行编码

//var_dump($row['data']['openid']);

/**********每一位关注公众号的用户信息*************/
$url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$access_token;
// foreach($row['data']['openid'] as $v){
//
//     $data = '{
//     "touser":"'.$v.'",
//     "msgtype":"mpnews",
//     "mpnews":
//     {
//          "media_id":"dI6fxjYIS3Pv5drHdLwelUL4EE4vh3slhuaQxHar6VY"
//     }
// }';
//
// }
$len=count($row['data']['openid']);
for ($i=0;$i<$len;$i++){
    $data = '{
    "touser":"'.$row['data']['openid'][$i].'",
    "msgtype":"mpnews",
    "mpnews":
    {
         "media_id":"dI6fxjYIS3Pv5drHdLwelUL4EE4vh3slhuaQxHar6VY"
    }
}';


    $ret = Http::post($url,$data);
    var_dump($ret);
}






// $data =' {
//    "touser":"'.$openid.'",
//    "msgtype":"text",
//    "text":
//    {
//         "content":"<a href=\"http://www.linktech.cn/AC_NEW/\">欢迎来到领克特</a>"
//    }
// }';



