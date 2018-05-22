<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/10 0010
 * Time: 16:30
 */

include "Http.class.php";
include "access_token.php";

/* 新增一个永久图文素材 */
//新增永久图文素材接口
$url = "https://api.weixin.qq.com/cgi-bin/media/uploadnews?access_token=".get_token();
//采用官方给的示例结构
$json = '{
		"articles": [{
				   "title": "欢迎加盟领克特",
				   "thumb_media_id": "dI6fxjYIS3Pv5drHdLwelbdKhhx5j0Q20abRx_wqhro",
				   "author": "领克特",
				   "digest": "欢迎来到linktech！！！",
				   "show_cover_pic": "1",
				   "content": "
                    
                            <h4> 北京联盟部：</h4><br/>
                           
                           <span>技术运维</span><br/>
                            部门：技术部<br/>
                            招聘人数：1位<br/>
                            工作地点：北京市朝阳区惠新东街11号紫光发展大厦A座7层702室 <br/><br/>
                            岗位职责：<br/>
                            1、数据传输接口对接<br/>
                            2、数据结算<br/>
                            3、其他日常技术运维业务<br/><br/>
                            职位要求：<br/>
                            1、大学2年制以上计算机专业者（大专以上）<br/>
                            2、接触过HTML, CSS<br/>
                            3、接触过PHP程序者优先<br/>
                            4、应届毕业生或工作经历不到1年的人才<br/><br/>
                    
                            
                    
           ",
       "content_source_url": "http://www.linktech.cn/newhome/"
    },
    
 ]
}';



//curl实现post请求
$ret = Http::post($url,$json);
$row = json_decode($ret);//对JSON格式的字符串进行编码

echo '此素材的唯一标识符media_id为：'.$row->media_id;