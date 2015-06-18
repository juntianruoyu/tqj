<?php
/**
 * ������ģʽ����һ����Ľӿ�ת���ɿͻ�ϣ��������һ���ӿڡ�Adapterģʽʹ��ԭ�����ڽӿڲ����ݶ�����һ��������Щ�����һ�������ṹ��ģʽ��
 * 
 * һ��Դ�ӿڣ������Ͽͻ�������
 * һ��Ŀ��ӿڣ��ͻ���Ҫ�Ľӿ�
 * �������࣬ʵ�ֿͻ��Ľӿڣ���װ��Դ�ӿ�
 */

//Դ�ӿ�
interface China{
	public function flat(); 
}

class Chinese implements China{
	public function flat(){
		echo '���ñ��ο׳��';
	}
}

//$xiaoming = new Chinese();
//$xiaoming->flat();

//�������Ѿ����ڵĶ���С���������й��ñ��ο������
//����������ŷ�ޣ�ŷ�޳����Բ�ο�


//Ŀ��ӿ�
interface Europe{
	public function round();
}

//������������Դ�ӿڣ�ʵ�֣��̳У�Ŀ��ӿ�
class European implements Europe{
	public $xiaoming;
	public function __construct($chinese){
		$this->xiaoming = $chinese;
	}
	
	public function round(){
		echo '��ŷ�ޣ����õ�Դ��������';
		$this->xiaoming->flat();
	}
}

class Client{
	public static function main(){
		$chinese = new Chinese();
		$european = new European($chinese);
		$european->round();
		
	}
}
Client::main();
?>