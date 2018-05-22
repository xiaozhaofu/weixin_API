<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/23 0023
 * Time: 13:42
 */
?>
<script>
    showToSina:function(contId,title,picUrl,portalUrl,contType){
        if (contType == 10){//问政
            var url_style = this.commonShareUrl;
        } else if (contType == 11){//问答详情页
            var url_style = this.commonQAShareUrl;
        } else if(contType == 12){//政务号详情
            var url_style = this.govHomeShareUrl;
        }
        var PP_TITLE = "【澎湃问政：";
        var localurl = portalUrl+url_style+contId;
        if(contType == 13){
            localurl = portalUrl + this.commonAllAskUrl;
        }
        var rtitle = title.replace("#","");
        var pp = encodeURI("我读澎湃");
        var _url = encodeURIComponent(localurl);
        var _t = encodeURI(PP_TITLE+rtitle+"】(分享自@澎湃新闻)");
        var _appkey = encodeURI("441808809");//你从微薄获得的appkey
        var _pic = encodeURI(picUrl);
        var _site = '';//你的网站地址
        var _u = 'http://service.weibo.com/share/share.php?url='+_url+'&appkey='+_appkey+'&pic='+_pic+'&title='+_t+'%23'+pp+'%23';
        window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
        shareStat("SINA", 3, localurl, contId, "");
    },
    showToTencent:function(contId,title,picUrl,portalUrl,contType){
        if (contType == 10){//问政
            var url_style = this.commonShareUrl;
        } else if (contType == 11){//问答
            var url_style = this.commonQAShareUrl;
        } else if(contType == 12){//政务号详情
            var url_style = this.govHomeShareUrl;
        }
        var PP_TITLE = "【澎湃问政：";
        var localurl = portalUrl+url_style+contId;
        if(contType == 13){
            localurl = portalUrl + this.commonAllAskUrl;
        }
        var pp = encodeURI("我读澎湃");
        var _t = encodeURI(PP_TITLE+title+"】(分享自@澎湃新闻)");
        var _url = encodeURIComponent(localurl);
        var _url = localurl;
        var _appkey = encodeURI("801495950");//你从腾讯获得的appkey
        var _pic = encodeURI(picUrl);//（例如：var _pic='图片url1|图片url2|图片url3....）
        var _site = '';//你的网站地址
        var _u = 'http://v.t.qq.com/share/share.php?url='+_url+'&appkey='+_appkey+'&site='+_site+'&pic='+_pic+'&title='+_t+'%23'+pp+'%23';
        window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
        shareStat("TENCENT", 3, localurl, contId, "weibo");
    },
    showTorenren : function(contId,title,picUrl,portalUrl,description,contType){
        if (contType == 10){//问政
            var url_style = this.commonShareUrl;
        } else if (contType == 11){//问答
            var url_style = this.commonQAShareUrl;
        } else if(contType == 12){//政务号详情
            var url_style = this.govHomeShareUrl;
        }
        var localurl = portalUrl+"/newsDetail_forward_"+contId;
        if(contType == 13){
            localurl = portalUrl + this.commonAllAskUrl;
        }
        var _t = encodeURI("【澎湃问政："+title+"】");
        var _url = encodeURIComponent(localurl);
        var _appkey = encodeURI("266744");//你从微薄获得的appkey
        var _pic = encodeURI(picUrl);
        var _site = '';//你的网站地址
        var _d = !description? _t : encodeURI(description);
        //var _u = 'http://share.renren.com/share/buttonshare.do?title='+_t+'&link='+_url+'&pic='+_pic;
        var _u = 'http://widget.renren.com/dialog/share?resourceUrl='+_url+'&srcUrl='+_url+'&title='+_t+'&pic='+_pic+'&description='+_d;
        window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
    },
    showToZone:function(contId,title,picUrl,portalUrl,description,contType){
        if (contType == 10){//问政
            var url_style = this.commonShareUrl;
        } else if (contType == 11){//问答
            var url_style = this.commonQAShareUrl;
        } else if(contType == 12){//政务号详情
            var url_style = this.govHomeShareUrl;
        }
        var PP_TITLE = "【澎湃问政：";
        var localurl = portalUrl+url_style+contId;
        if(contType == 13){
            localurl = portalUrl + this.commonAllAskUrl;
        }
        var _t = encodeURI(PP_TITLE+title+"】");
        var _url = encodeURIComponent(localurl);
        var _appkey = encodeURI("266744");//你从微薄获得的appkey
        var _pic = encodeURI(picUrl);
        var _site = '';//你的网站地址
        var _d = !description? _t : encodeURI(description);
        var _u = 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+_url+'&title='+_t+'&pics='+_pic+'&desc='+_d+'&summary='+_d;
        window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
        shareStat("TENCENT", 3, localurl, contId, "qzone");
    }
</script>
