<?php 
/*
 * ����ģʽ
 * Ϊ���������ṩһ�ִ����Կ��ƶ��������ķ��ʡ�
 * ��ĳЩ����£�һ�������ʺϻ��߲���ֱ��������һ�����󣬶������������ڿͻ��˺�Ŀ�����֮�����н�����á�
 * ���ž�����������˽����Ĵ����������ǿͻ��ˣ��˽����Ƕ�����
 */

interface women{
	public function ml();
	public function say();
}

class pjl implements women{
	public function say(){
		echo 'I am panjinlian,i want to  ml with man';
	}
	public function ml(){
		echo 'hehe';
	}
}

class wangpo implements women{
	public $a;
	public function __construct(){
		$this->a = new pjl();
	}
	
	public function say(){
		$this->a->say();
	}
	public function ml(){
		$this->a->ml();
	}
}

$m = new wangpo();
$m->say();
echo "<br/>";
$m->ml();
?>