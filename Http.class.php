<?php

// 微信兼容方法
class Http
{

    public static function get($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//将返回结果进行转换
        $res = curl_exec($ch);//发送请求
        return $res;//将结果返返回



    }




    public static function post($url, $filedata)
    {
        $curl = curl_init();
        if(class_exists('./CURLFile'))//php5.5跟php5.6中的CURLOPT_SAFE_UPLOAD的默认值不同
        {
            curl_setopt($curl, CURLOPT_SAFE_UPLOAD, true);
        }else
        {
            if(defined('CURLOPT_SAFE_UPLOAD'))
            {
                curl_setopt($curl, CURLOPT_SAFE_UPLOAD, true);
            }
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        if(!empty($filedata))
        {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $filedata);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
    public function curl_request($api, $method = 'GET', $params = array(), $headers = [])
    {
        $curl = curl_init();

        switch (strtoupper($method)) {
            case 'GET' :
                if (!empty($params)) {
                    $api .= (strpos($api, '?') ? '&' : '?') . http_build_query($params);
                }
                curl_setopt($curl, CURLOPT_HTTPGET, TRUE);
                break;
            case 'POST' :
                curl_setopt($curl, CURLOPT_POST, TRUE);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

                break;
            case 'PUT' :
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
                break;
            case 'DELETE' :
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
                break;
        }

        curl_setopt($curl, CURLOPT_URL, $api);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_HEADER, 0);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);

        if ($response === FALSE) {
            $error = curl_error($curl);
            curl_close($curl);
            return FALSE;
        }else{
            // 解决windows 服务器 BOM 问题
            $response = trim($response,chr(239).chr(187).chr(191));
            $response = json_decode($response, true);
        }

        curl_close($curl);

        return $response;
    }
}
 