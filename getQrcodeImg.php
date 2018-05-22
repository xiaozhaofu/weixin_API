<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/22 0022
 * Time: 14:27
 */
// 下载远程文件到本地
function getImage($url,$save_dir='',$filename=''){
    // 根据url获取远程文件
    // 先使用PHP CURL从下载临时素材接口获取文件流，再使用file_put_contents()方法把文件流写入指定的目录文件
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_TIMEOUT,500);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch,CURLOPT_URL,$url);
    $res = curl_exec($ch);
    curl_close($ch);

    // 把图片保存到指定目录下的指定文件
    file_put_contents($save_dir.$filename,$res);
    return array(
        'file_name'=>$filename,
        'save_path'=>$save_dir.$filename,
        'error'=>0
    );

}
$url = $_GET['url'];

$dir = realpath('./')."/uploads/image/";
$filename = time().'.png';
//删除图片
// unlink("./uploads/image/1526978565.png");

$img = getImage("/wechatAPI/qrcode/makeqrcode.php?qrlink=" . urlencode($url),$dir,$filename);

var_dump($img);
