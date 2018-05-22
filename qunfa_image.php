<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/10 0010
 * Time: 17:48
 */
include "Http.class.php";
include "access_token.php";
/* 新增一个永久素材 */
//url 里面的需要2个参数一个 access_token 一个是 type（值可为image、voice、video和缩略图thumb）

$url = "https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token=".get_token();

//realpath获取一个素材的绝对路径，以便进行上传到微信服务器
if (class_exists('\CURLFile')) {
    $josn = array('media' => new \CURLFile(realpath("banner_03.jpg")));
} else {
    $josn = array('media' => '@' . realpath("banner_03.jpg"));
}

//curl实现post请求
$ret = Http::post($url,$josn);
$row = json_decode($ret);//对JSON格式的字符串进行编码
//可得到一下两种结果media_id和url
//echo '此素材的唯一标识符media_id为：'.$row->url;//得到上传素材后，此素材的唯一标识符url
//http://mmbiz.qpic.cn/mmbiz_jpg/WTrQxxjXibduVHRj0aESmuHKicD0ZUjKx0uVUanVIfeDzVZm8cx0JMLibGRuQQPqn40QpPiaep5NM6ucpCRY5SFlwg/0
var_dump($row);