<?php
  //include "Http.class.php";
	// AppID和AppSecret可在“微信公众平台-开发-基本配置”页中获得（需要已经成为开发者，且帐号没有异常状态f81271792adb6cde12ad9b9ae5612ae1
	const APPID = "";
	const APPSEC = "";

	function get_token()
	{
		// 公众号可以使用AppID和AppSecret调用本接口来获取access_token https请求方式: GET
		$urlToken = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSEC;
		// 使用AppID和AppSecret调用本接口来获取access_token https请求方式: GET
		
		$res = Http::get($urlToken);				

		$arr = json_decode($res, true);

		return $arr['access_token'];


	}
	 // $acc=get_token();
	  //var_dump($acc);


