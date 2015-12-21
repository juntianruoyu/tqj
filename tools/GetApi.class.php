<?php
/**
 *
 * 调用api封装类。
 * @author tianquanjun
 *
 */
class GetApi{
	/**
	 * API地址必须，默认get方法，参数默认为空数组
	 */
	public static function request($api,$method='GET',$params=array()){
		if(strtoupper($method)=='GET'){
			$res = self::getMethod($api,$params);
		}
		if(strtoupper($method) == 'POST'){
			$res = self::postMethod($api,$params);
		}
		return $res;
	}

	private static function getMethod($api,$params){

		$ch = curl_init();//初始化
		$k = 0;
		foreach ($params as $key=>$value){
			if($k==0){
				$api = $api.'?'.$key.'='.$value;
			}else{
				$api = $api.'&'.$key.'='.$value;
			}
			$k++;
		}


		/*============开始设置curl各种选项================*/
		curl_setopt($ch, CURLOPT_URL, $api);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


		$html = curl_exec($ch);//执行句柄，获取返回内容

		curl_close($ch);//释放句柄
		return $html;
	}

	private static function postMethod($api,$params){

		$ch = curl_init ();

		//各种项设置，网上参考而来，可以查看php手册，自己设置
		curl_setopt ( $ch, CURLOPT_URL, $api );
		curl_setopt ( $ch, CURLOPT_POST, 1 );//post方式
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $params);

		//执行
		$return = curl_exec ( $ch );
		//释放
		curl_close ( $ch );
		return $return;

	}
}
?>
