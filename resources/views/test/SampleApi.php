<?php

/**
 * @name Service_Page_SampleApi
 * @desc sample api page service
 * @author baixiaoling(suhaidong@baidu.com)
 */
class Service_Page_SampleApi
{
    /**
     *
     * @param input
     * @return result
     *
     **/
    public function execute($arrInput)
    {
        $params = array(
            'ak' => 'nc', // 由百度分配的ak
            'av' => 3,
            'cn' => '300000000',
            'coordtype' => 2,
            'crd' => "114.054895_22.596338", //经纬度以下划线拼接
            'uuid' => 'test', // 用户id
            'word' => "我要听刘德华的歌曲", // 客户端传入的query
            'clientip' => '111.208.0.0', //客户端ip
            'c' => 'a',
            'query_type' => 1,
        );

        ksort($params);
        $string = "";
        foreach ($params as $key => $value) {
            $string .= $key . "=" . urlencode($value);
        }
        $sign = md5("123456" . $string . "123456"); // 联调分配的前后缀 123456，正式环境需要百度分配
        $params['sign'] = $sign;

        $url = "http://183.232.231.82:80/codriverapi/robokit?" . http_build_query($params);

        //用curl发起http请求， 别的方式也可以
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_PORT => "80",
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}
