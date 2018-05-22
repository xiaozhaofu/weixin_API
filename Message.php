<?php

class Message
{
    public static $toUserName;
    public static $fromUserName;
    public static $postObj;
    public static $str1;

    public static function init()
    {
        // 获取请求的原始字符串,php5用这个
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        //php7.1的用这个方法获取
        // $postStr = file_get_contents("php://input");
        self::$str1 = $postStr;

        self::$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        self::$toUserName = self::$postObj->FromUserName;
        self::$fromUserName = self::$postObj->ToUserName;

    }
    // 被动回复文本
    public static function bReplyText($content)
    {
        self::init();
        echo "<xml>

				<ToUserName><![CDATA[".self::$toUserName."]]></ToUserName>

				<FromUserName><![CDATA[".self::$fromUserName."]]></FromUserName>

				<CreateTime>".time()."</CreateTime>

				<MsgType><![CDATA[text]]></MsgType>

				<Content><![CDATA[".$content."]]></Content>

				</xml>";
    }
    //被动回复文本
    public static function defaultText($content)
    {
        self::init();
        echo "<xml>

				<ToUserName><![CDATA[".self::$toUserName."]]></ToUserName>

				<FromUserName><![CDATA[".self::$fromUserName."]]></FromUserName>

				<CreateTime>".time()."</CreateTime>

				<MsgType><![CDATA[text]]></MsgType>

				<Content><![CDATA[".$content."]]></Content>

				</xml>";
    }
    // 被动回复图片
    public static function bReplyImage($imgId)
    {
        self::init();
        echo "<xml>
		 	<ToUserName><![CDATA[".self::$toUserName."]]></ToUserName>
		 	<FromUserName><![CDATA[".self::$fromUserName."]]></FromUserName>
		 	<CreateTime>".time()."</CreateTime>
		 	<MsgType><![CDATA[image]]></MsgType>
		 	<Image>
		 	<MediaId><![CDATA[".$imgId."]]></MediaId>
		 	</Image>
		 	</xml>";
    }

    //被动回复一个图文消息
    public static function ReplyNews($title,$digest,$content_source_url){
        self::init();
        echo "<xml>
				<ToUserName><![CDATA[".self::$toUserName."]]></ToUserName>
				<FromUserName><![CDATA[".self::$fromUserName."]]></FromUserName>
				<CreateTime>".time()."</CreateTime>
				<MsgType><![CDATA[news]]></MsgType> 
				<ArticleCount>1</ArticleCount>
				<Articles>
				<item>
				<Title><![CDATA[".$title."]]></Title>
				<Description><![CDATA[".$digest."]]></Description>
				<PicUrl><![CDATA[http://mmbiz.qpic.cn/mmbiz_png/5f17UGDx5AELZ4maez2F0mOrnDtVib8VAldpNdAbOry80EVEtAcdZKHNyhpXDkibyNOWdpkUolANTfsSiaCiauIZicg/0?wx_fmt=png]]></PicUrl>
				<Url><![CDATA[".$content_source_url."]]></Url>
				</item>
				</Articles>
				</xml>
				";
    }

    //回复多个图文消息
    public static function ReplyMultipleNews()
    {
        self::init();
        echo "<xml>
				<ToUserName><![CDATA[".self::$toUserName."]]></ToUserName>
				<FromUserName><![CDATA[".self::$fromUserName."]]></FromUserName>
				<CreateTime>".time()."</CreateTime>
				<MsgType><![CDATA[news]]></MsgType> 
				<ArticleCount>3</ArticleCount>
				<Articles>
				<item>
				<Title><![CDATA[京粉5月-嗨翻血拼月]]></Title>
				<Description><![CDATA[此次活动分为贯穿整月的“拼购”商品奖励和限时两天的“京粉”奖励活动]]></Description>
				<PicUrl><![CDATA[http://mmbiz.qpic.cn/mmbiz_png/5f17UGDx5AELZ4maez2F0mOrnDtVib8VAu9ApAEVBZRllhFSetGFamaIHs1zXjS0bT7WhCllHeia3TgiapQpYSwlQ/0?wx_fmt=png]]></PicUrl>
				<Url><![CDATA[https://mp.weixin.qq.com/s?__biz=MzI2MzU0MTc3OA==&mid=2247484016&idx=1&sn=35b011b3b972b86bec1db2603cd084f4&chksm=eabb070dddcc8e1b1d24514f16d0efbd289e5bac3237e07996231392e80d6729de81198b485c#rd]]></Url>
				</item>
				
				<item>
				<Title><![CDATA[国美315期间促销活动+奖励活动]]></Title>
				<Description><![CDATA[国美315期间促销活动+奖励活动]]></Description>
				<PicUrl><![CDATA[http://mmbiz.qpic.cn/mmbiz_jpg/5f17UGDx5AELZ4maez2F0mOrnDtVib8VAuNEfWvamOn3RZmO7yNLTyo02PbWfucfcw2GvoyTLU8dxAykqKhGkPw/0?wx_fmt=jpeg]]></PicUrl>
				<Url><![CDATA[https://mp.weixin.qq.com/s?__biz=MzI2MzU0MTc3OA==&mid=2247483941&idx=2&sn=d9f365a957c0edf714f12f7e23f3bd10&chksm=eabb0758ddcc8e4e4c41997854b42ce627308de6b3fc4c9b69a4cefe69b13b9ecddb2a1982ca#rd]]></Url>
				</item>
				
				<item>
				<Title><![CDATA[京东“蝴蝶节”重磅来袭]]></Title>
				<Description><![CDATA[京东“蝴蝶节”重磅来袭]]></Description>
				<PicUrl><![CDATA[http://mmbiz.qpic.cn/mmbiz_jpg/5f17UGDx5AELZ4maez2F0mOrnDtVib8VADT0JRYWicFC6NbyAGxLIBW8MqLMPeGNKIiaojmqXjcSFzAiaomC8icV42g/0?wx_fmt=jpeg]]></PicUrl>
				<Url><![CDATA[https://mp.weixin.qq.com/s?__biz=MzI2MzU0MTc3OA==&mid=2247483941&idx=3&sn=a2974072fcc4c06fccb2d860c72959d2&chksm=eabb0758ddcc8e4e2096bd642e21da5ee664d4038bcf190d9c5a05cdb1bb6ce1083fe075dff6#rd]]></Url>
				</item>
				</Articles>
				</xml>
				";
    }

}
