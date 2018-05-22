<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/10 0010
 * Time: 15:11
 */
/**
 * 客服群发消息
 */
include "Http.class.php";
include "access_token.php";


$url = "https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=".get_token();


//dI6fxjYIS3Pv5drHdLwelUL4EE4vh3slhuaQxHar6VY,  dI6fxjYIS3Pv5drHdLwelVmRHOOGxTRj1wSn_tEATKc
$data = '{
   "filter":{
    "is_to_all":true,
      "tag_id":0
   },
   "mpnews":{
    "media_id":"dI6fxjYIS3Pv5drHdLwelUL4EE4vh3slhuaQxHar6VY"
   },
    "msgtype":"mpnews",
    "send_ignore_reprint":0
}';

// $data='{
//     "filter":{
//     "is_to_all":true,
//       "tag_id":0
//    },
//    "text":{
//     "content":"大江东去浪淘尽，书千古风流人物"
//    },
//     "msgtype":"text"
// }';
$res = Http::post($url,$data);

 $row = json_decode($res);


var_dump($row);