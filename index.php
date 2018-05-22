<?php
       header('content-type:text/html;charset=utf8');
       	include "Message.php";
		include "Http.class.php";
        include "downloadImg.php";
		//php7.1的用这个方法获取
            $postStr = file_get_contents("php://input");
       	// 获取请求的原始字符串,php5用这个方法
        // $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

       	//file_put_contents("data.txt", Message::$str1."\r\n", FILE_APPEND);
		if (!empty($postStr)){
			$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $event = $postObj->Event;
                $eventKey = $postObj->EventKey;
                $mediaId = $postObj->MediaId;
				//接收用户消息类型,要用trim进行处理一下
                // 要用trim处理
				$msgType = trim($postObj->MsgType);
                $keyword = trim($postObj->Content);
				
				if($msgType == 'text'){
				
					if(!empty( $keyword ))
					{
						  switch($keyword){
							case '图片':
								Message::bReplyImage("dI6fxjYIS3Pv5drHdLwelcdwd743wzlUkM59ETr0fBs");
							break;
							case '文本':
								Message::bReplyText("世界之大，无所不有，欢迎来到<a href='http://xiaozhaofu.gw8888.com' > 购 物 吧 </a>游览，这里有世界上各大知名品牌的网络商城，不管能不能买得起，不过可以开眼界了[微笑][微笑][微笑]");
							break;
							case '视频':
								Message::bReplyVideo("2sT7Y9gZRbPr9Ikfjk0ZW4A6QB-1derPFUX3y2tDucXvFACM-L_P_D7USnkvj5gK",'天天来搞笑','搞笑');
							break;
							//dI6fxjYIS3Pv5drHdLwelZTMKb9vwMwwnSE27fnrhow
							case '图文':
								Message::ReplyNews("招聘啦！！！！","linktech招兵买马，聚一方英才!!!","http://mp.weixin.qq.com/s?__biz=MzU4MzEzODA2MQ==&mid=100000029&idx=1&sn=b7e463168ac53a3d14181dbcb228f0ab&chksm=7dacef7f4adb6669e4cea795b7bb152157d15e5674c6295ec199a47f01f48ea2bf8cbee17f88#rd");
							break;
							case '?':
								
								Message::defaultText('本账号为绿色健康账号,请输入【文本】或者【视频】或者【图片】,【图文】来获取信息!!!!');
								
							break;
							case '？':
								Message::defaultText('本账号为绿色健康账号,请输入【文本】或者【视频】或者【图片】,【图文】来获取信息!!!!');
								
							break;
							// default:
							// 	//添加图灵机器人代码
							// 	$url = "http://www.tuling123.com/openapi/api?key=9009fc44f168cfc7055c8a469821ce9b&info={$keyword}";
							// 	//模拟发送http中的get请求
                				// $str = Http::get($url);
                            //
                				// $json = json_decode($str);
                            //
                				// $contentStr = $json->text;
							// 	Message::defaultText($contentStr);
							//
							// break;
						  }
					
					}
				}else if($msgType=='event' && $event=='CLICK'){
						if($eventKey == 'coupon'){
							Message::bReplyText("<a href='http://www.linktech.cn/AC_NEW/merchant/coupon_list.php' >最新优惠券，尽在领克特</a>");
						}
						if($eventKey == 'merchant'){
							Message::bReplyText("
							北京
							联系人:jono
							QQ:89907017
							电话:010-62695250转802
							邮箱:bjmc@linktech.cn

							上海
							联系人:candy
							QQ:89903084
							电话:021-58982006转808
							邮箱:shguanggao@linktech.cn

							深圳
							联系人:dan
							QQ:2890159412
							电话:0755-86621916
							邮箱:szguanggao@linktech.cn
							");
						}

						if($eventKey == 'merchant'){
						header("Location:mqqwpa://im/chat?chat_type=wpa&uin=613465892&version=1&src_type=web&web_src=bjhuli.com");
						}
					}elseif($msgType=='event' && $event=='subscribe'){
						//当关注公众号时，自动给用户发送的消息
						Message::ReplyNews("招聘啦！！！！","linktech招兵买马，聚一方英才!!!","http://mp.weixin.qq.com/s?__biz=MzU4MzEzODA2MQ==&mid=100000029&idx=1&sn=b7e463168ac53a3d14181dbcb228f0ab&chksm=7dacef7f4adb6669e4cea795b7bb152157d15e5674c6295ec199a47f01f48ea2bf8cbee17f88#rd");
					}elseif($msgType=='image'){
                    // $mediaId
                    $img = downloadImg($mediaId);
                     Message::bReplyText("你的图片已保存成功,图片信息：
                     
media_id: 
{$mediaId}

文件名称：
{$img['file_name']}

保存路径：<a href=\"https://47.94.215.115{$img['save_path']}\">查看</a>
{$img['save_path']}

链接地址：
$postObj->PicUrl;
");


                }
                
		}
		

       	//根据用户点击的菜单，返回图片
       	// if(Message::$postObj->ScanResult == '1234567'){
       	// 	Message::bReplyImage("bPeTCs7Nh5jdGBEKE95ZkXf7UECYiqFn8COKnvBCq5Lty1V0dkq8AnvvseN_T3ln");
       	// }

       	//被动回复文本
       	 //Message::bReplyText("世界之大，无所不有，欢迎来到<a href='http://xiaozhaofu.gw8888.com' > 购 物 吧 </a>游览，这里有世界上各大知名品牌的网络商城，不管能不能买得起，不过可以开眼界了[微笑][微笑][微笑]");

       	// 被动回复图片
       //	 Message::bReplyImage("Qt3i6zPHSC60eCFtks-YRILUwgttxGSA-nmU2Ov5Jl1Y5U7SJWhW5_mhV4RyndRE");

       	//被动回复语音
       	// Message::bReplyVoice('wribJ9jat5RXW8SYoDs7k0Ru_8z0Omro429kEA1o5OgHy494Ogg5pgOlyZ9nCCDt');

       	// 被动回复视频
       	 //Message::bReplyVideo("2sT7Y9gZRbPr9Ikfjk0ZW4A6QB-1derPFUX3y2tDucXvFACM-L_P_D7USnkvj5gK",'天天来搞笑','搞笑');


