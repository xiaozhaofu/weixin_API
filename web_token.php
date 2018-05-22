<?php
include "Http.class.php";
const APPID = "wx860c97122061b33c";
const APPSEC = "07cbaf39223a736e7d7c0489a9e68547";


//通过用户的code，获取access_token和openid
function get_actoken()
	{
		// 公众号可以使用AppID和AppSecret调用本接口来获取access_token https请求方式: GET
		$urlToken="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSEC."&code=081swqBe0T4NpA1UdMAe0H2sBe0swqBZ&grant_type=authorization_code";
		// 使用AppID和AppSecret调用本接口来获取access_token https请求方式: GET
		
		$res = Http::get($urlToken);				

		$arr = json_decode($res);

		return $arr;


	}
	
	// $res = get_actoken();
	// var_dump($res);


//https://api.weixin.qq.com/sns/userinfo?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN 

function get_info()
{
	$res = get_actoken();
	$url="https://api.weixin.qq.com/sns/userinfo?access_token=".$res->access_token."&openid=".$res->openid."&lang=zh_CN";
	$infores = Http::get($url);				

		$info = json_decode($infores);

		return $info;

}

	$info = get_info();
	var_dump($info);
