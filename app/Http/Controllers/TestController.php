<?php
namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class TestController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function show()
	{
		$settings = \Utilities::getSettings();
		
		return view('settings.show', compact('settings'));
	}
	
	
	/**
	 *
	 * @param input
	 * @return result
	 *
	 **/
	public function execute()
	{
		$params = array(
				'ak' => 'cl', // 正式环境需由百度分配的ak
				'av' => 5, // 需要返回音频资源时，av=5
				'cn' => '300000000',
				'coordtype' => 2,
				'crd' => "114.054895_22.596338", //经纬度以下划线拼接
				'uuid' => 'test', // 用户id
				'word' => "刘德华",
				'clientip' => '111.208.0.0', //客户端ip
				'c' => 'a',
				'query_type' => 1,
		);
		
		ksort($params);
		$string = "";
		foreach ($params as $key => $value) {
			$string .= $key . "=" . urlencode($value);
		}
		echo("<script>console.log('".$string."');</script>");
		
		$sign = md5("D%k2tJ" . $string . "GmDW#U"); // 联调分配的前后缀，→百度同学分配，用于接口加密
		$params['sign'] = $sign;
		echo("<script>console.log('".$sign."');</script>");
		
		$url = "http://183.232.231.82:80/codriverapi/robokit?" . http_build_query($params);
		
		echo("<script>console.log('".$url."');</script>");
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
