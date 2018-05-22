<?php  
 
include "Http.class.php";  
include "access_token.php";  


/* 获取一个永久素材的列表 */  
//url 里面的需要1个参数一个 access_token   
$url = "https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=".get_token();  

//采用官方给的‘调用示例’格式
//type.素材的类型，图片（image）、视频（video）、语音 （voice）、图文（news）
//offset. 0表示从第一个素材 返回 3. 返回素材的数量，取值在1到20之间
$josn = '{
		   "type":"image",
		   "offset":"0",
		   "count":"2"
		}'; 

//curl实现post请求 
$ret = Http::post($url,$josn);  
//$row = json_decode($ret);//对JSON格式的字符串进行编码  

var_dump($ret);	//得到此图文素材的url
echo '<hr/>';
//echo '此素材的唯一标识符media_id为：'.$res->url;//得到上传素材后，此素材的唯一标识符media_id  

 