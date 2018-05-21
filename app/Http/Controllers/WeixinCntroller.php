<?php
namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
class weixinController extends Controller
{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	
	
	//验证消息
	
	public function api()
	{
		$echoStr = $_GET["echostr"];
		if($this->checkSignature()){
			echo $echoStr;
			exit;
		}
	}
	//检查签名
	private function checkSignature()
	{
		$signature = $_GET["signature"];
		$timestamp = $_GET["timestamp"];
		$nonce = $_GET["nonce"];
		$token = "weixin";
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode($tmpArr);
		$tmpStr = sha1($tmpStr);
		if($tmpStr == $signature){
			return true;
			
		}else{
			return false;
		}
	}
	//响应消息
	public function responseMsg(Request $request){
		
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
		if (!empty($postStr)){
			$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
			$RX_TYPE = trim($postObj->MsgType);
			//   $this->test($RX_TYPE) ;
			switch ($RX_TYPE)
			{
				case "text":
					$resultStr = $this->receiveText($postObj);
					break;
				case "image":
					$resultStr = $this->receiveImage($postObj);
					break ;
				case "voice":
					$resultStr = $this->receiveVoice($postObj) ;
					break ;
				case "event":
					$resultStr = $this->receiveEvent($postObj);
					break;
				default:
					$resultStr = "unknow msg type: ".$RX_TYPE;
					break;
			}
			echo $resultStr;
		}else {
			echo "";
			exit;
		}
	}
}