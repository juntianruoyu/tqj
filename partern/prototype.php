<?php
/**
 * ԭ��ģʽ��ͨ�������Ѿ����ڵĶ����������¶���
 * ͨ��ԭ��ʵ��ָ��������������࣬����ͨ��copy��Щԭ�ʹ����ŵĶ���
 * �Ǵ�����ģʽ
 * �е�ʱ�򴴽�һ�������кܶಽ����������һ�������Ĵ������̣���Ҫ�ٴ���һ���Ļ������ô�ͷ��ʼ�����縴�ƣ�ʹ��ԭ��ģʽʵ�֡�
 * ԭ��ģʽ������ĳ�������������е�״̬
 */

interface Potrotype{
	public function copy();
}

//ͨ����ԭ�����м�һ��copy������ʹ�����ԭ�����ʵ�����Ա�����
class Demo implements Potrotype{
	private $state;
	
	public function setState($state){
		$this->state = $state;
	}
	
	public function getState(){
		return $this->state;
	}
	
	public function copy(){
		return clone $this;//ǳ����

		/*
		 * ���
		 */
//		$tmp = serialize($this);
//		$tmp = unserialize($tmp);
//		return $tmp;
	}
}

class Client{
	public static function main(){
		$obj1 = new Demo();
		$obj1->setState(23);
		$obj2 = $obj1->copy();
		$res = $obj2->getState();
		echo $res;
	}
}
Client::main();
?>

