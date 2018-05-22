<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/13 0013
 * Time: 11:55
 */
include "access_token.php";

function downloadImg($mediaId){         //此方法用来执行下载操作
    $url = "https://api.weixin.qq.com/cgi-bin/media/get?access_token=".get_token()."&media_id={$mediaId}";
    // 创建目录
    $date_time = date('Y-m-d',time());
    $dir = realpath('./')."/uploads/image/".$date_time."/";
    if (!file_exists($dir)){
        mkdir($dir,777);
    }
    $time = time();
    $filename = 'wx_'.$time.rand(1000,9999).'.jpg';
    $img = getImage($url,$dir,$filename);
    $img['today_time'] = $date_time;
    return $img;
}

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


?>

