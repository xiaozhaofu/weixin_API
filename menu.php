<?php

	include "Http.class.php";
	include "access_token.php";
	include "Message.php";
	$postStr = file_get_contents("php://input");
	$data = array();

	$data['button'] = array(
		array(
			'name' => '领克特',
			'sub_button' => array(
				//click
				array(
					'type' => 'click',
					'name' => '最新优惠券',
					'key' => 'coupon'
				),
				//view  tencent://message/?uin=$qqnum&Site=在线咨询&Menu=yes
				array(
					'type' => 'view',
					'name' => '微信2.0测试',
					'url' => 'http://weixin.linktech.cn/v2/framework/vux3/dist/#/'
				),

				// scancode_push
				array(
					'type' => 'scancode_push',
					'name' => '扫一扫',
					'key' => 'saoma'
				),
            array(
					'type' => 'view',
					'name' => '微信首页',
					'url' => 'http://weixin.linktech.cn/index.php'
				)
			)
		),

		array(
			'name' => '☎联系我们',
			'sub_button' => array(
				// scancode_waitmsg
//				array(
//					'type' => 'scancode_waitmsg',
//					'name' => '扫码带提示',
//					'key' => 'saomadaitishi'
//				),
				// pic_sysphoto
				array(
					'type' => 'click',
					'name' => '☕广告主合作',
					'key' => 'merchant'
				),
                array(
					'type' => 'pic_sysphoto',
					'name' => '系统拍照发图',
					'key' => 'photo'
				),
				array(
					'type' => 'view',
					'name' => '专属QQ客服',
					'url' => 'http://wpa.qq.com/msgrd?v=3&uin=97539165&site=qq&menu=yes'
				),
				// pic_photo_or_album
				array(
					'type' => 'view',
					'name' => '意向合作',
					'url' => 'http://mp.weixin.qq.com/s?__biz=MzU4MzEzODA2MQ==&mid=100000038&idx=1&sn=a208060241edc8b799bcd06ab840e540&chksm=7dacef444adb665224b268225b8ee1874edeb0204e4c3ab7add1321790670fd612e73aa2ee75#rd'
				),
				//
			)
		),
		array(
			'name' => '购物吧',
			'sub_button' => array(
				// pic_weixin
				array(
					'type' => 'pic_weixin',
					'name' => '相册发图',
					'key' => 'wxxcft'
				),
				// location_select
				array(
					'type' => 'location_select',
					'name' => '发送位置',
					'key' => 'fsdw'
				),
				array(
					'type' => 'view',
					'name' => '我的购物吧',
					'url' => 'http://xiaozhaofu.gw8888.com'
				)
			)
		)
	);

	function decodeUnicode($str)
	{
	    return preg_replace_callback('/\\\\u([0-9a-f]{4})/i',
	        create_function(
	            '$matches',
	            'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");'
	            // 'return iconv( "UCS-2BE","UTF-8",pack("H*", $matches[1]));'
	        ),
	        $str);
	}

	$str = json_encode($data);

	$strZ = decodeUnicode($str);


	//自定义菜单接口 http请求方式：POST（请使用https协议） "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=ACCESS_TOKEN"

	$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".get_token();

	$res = Http::post($url, $strZ);


	var_dump($res);

