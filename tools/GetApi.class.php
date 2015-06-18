<?php
/**
 *
 * ����api��װ�ࡣ
 * @author tianquanjun
 *
 */
class GetApi{
	/**
	 * API��ַ���룬Ĭ��get����������Ĭ��Ϊ������
	 */
	public static function request($api,$method='GET',$params=array()){
		if(strtoupper($method)=='GET'){
			$res = self::getMethod($api,$params);
		}
		if(strtoupper($method) == 'POST'){
			$res = self::postMethod();
		}
		return $res;
	}

	private static function getMethod($api,$params){

		$ch = curl_init();//��ʼ��
		$k = 0;
		foreach ($params as $key=>$value){
			if($k==0){
				$api = $api.'?'.$key.'='.$value;
			}else{
				$api = $api.'&'.$key.'='.$value;
			}
			$k++;
		}


		/*============��ʼ����curl����ѡ��================*/
		curl_setopt($ch, CURLOPT_URL, $api);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


		$html = curl_exec($ch);//ִ�о������ȡ��������

		curl_close($ch);//�ͷž��
		return $html;
	}

	private static function postMethod($api,$params){

		$ch = curl_init ();

		//���������ã����ϲο����������Բ鿴php�ֲᣬ�Լ�����
		curl_setopt ( $ch, CURLOPT_URL, $api );
		curl_setopt ( $ch, CURLOPT_POST, 1 );//post��ʽ
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $params);

		//ִ��
		$return = curl_exec ( $ch );
		//�ͷ�
		curl_close ( $ch );
		return $return;

	}
}
?>