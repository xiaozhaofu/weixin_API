<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/23 0023
 * Time: 11:58
 */

require_once "JSSDK.class.php";
$jssdk = new JSSDK("wx860c97122061b33c", "07cbaf39223a736e7d7c0489a9e68547");
$signPackage = $jssdk->GetSignPackage();

$news = array(
    "Title" =>"微信公众平台开发实践",
    "Description"=>"本书共分10章，案例程序采用广泛流行的PHP、MySQL、XML、CSS、JavaScript、HTML5等程序语言及数据库实现。",
    "PicUrl" =>'http://images.cnitblog.com/i/340216/201404/301756448922305.jpg',
    "Url" =>'http://www.linktech.cn/AC_NEW/login/login.php'
);
?>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: <?php echo $signPackage["timestamp"];?>,
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: [
            // 所有要调用的 API 都要加到这个列表中
            'checkJsApi',
            'openLocation',
            'getLocation',
            'onMenuShareTimeline',
            'onMenuShareAppMessage'
        ]
    });

    wx.ready(function () {
    });

    wx.checkJsApi({
        jsApiList: [
            'getLocation',
            'onMenuShareTimeline',
            'onMenuShareAppMessage'
        ],
        success: function (res) {
            alert(JSON.stringify(res));
        }
    });

    wx.onMenuShareAppMessage({
        title: '<?php echo $news['Title'];?>',
        desc: '<?php echo $news['Description'];?>',
        link: '<?php echo $news['Url'];?>',
        imgUrl: '<?php echo $news['PicUrl'];?>',
        trigger: function (res) {
            // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
            // alert('用户点击发送给朋友');
        },
        success: function (res) {
             alert('已分享');
        },
        cancel: function (res) {
            // alert('已取消');
        },
        fail: function (res) {
            // alert(JSON.stringify(res));
        }
    });

    wx.onMenuShareTimeline({
        title: '<?php echo $news['Title'];?>',
        link: '<?php echo $news['Url'];?>',
        imgUrl: '<?php echo $news['PicUrl'];?>',
        trigger: function (res) {
            // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
            // alert('用户点击分享到朋友圈');
        },
        success: function (res) {
            // alert('已分享');
        },
        cancel: function (res) {
            // alert('已取消');
        },
        fail: function (res) {
            // alert(JSON.stringify(res));
        }
    });
</script>
