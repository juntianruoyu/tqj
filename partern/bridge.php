<?php
/** �Ž�ģʽ�������󲿷���ʵ�ֲ��ַ��룬ʹ���Ƕ����Զ����ı仯��
 * 
 * �����ϵͳ�У�ĳЩ��������������߼�����������������ά�ȵı仯,�Ž�ģʽ����Ӧ�����ֶ�ά�ȵı仯
 */



//���ӣ�����·����ʻ���ٶȿɱ䡣����ά�ȣ�·�������ٶȡ�2*2*2=8�����
//�����·�������ٶȣ��ֱ�ʵ�֡�����·��Ϊ��ײ㣬���������ٶ�ʵ������Ҳ���԰��ٶȷŵ������棬���ŵ�·���棩

//��������ϣ�����˵�е���Ҫ����ά�ȣ���ô����ȫ���ϼ��ɣ��еĲ���Ҫ����ά�ȣ��Ǿ�ȥ����Ҫ��ά��(�����ٵ���ʻ������Ҫ·)
interface Road{
	public function run();
}

class Street implements Road{
	public $car;
	public $speed;
	public function __construct($car,$speed){
		$this->car = $car;
		$this->speed = $speed;
	}
	
	public function run(){
		echo $this->car->run();
		echo $this->speed->showSpeed();
		echo '��ʻ����ͨ�ֵ���';
	}
}

class Freeway implements Road{
	public $car;
	public $speed;
	public function __construct($car,$speed){
		$this->car = $car;
		$this->speed = $speed;
	}
	
	public function run(){
		echo $this->car->run();
		echo $this->speed->showSpeed();
		echo '��ʻ�ڸ��ٹ�·��';
	}
}

interface Car{
	public function run();
}

class Jeep implements Car{
	public function run(){
		echo '���ճ�';
	}
}

class Bus implements Car{
	public function run(){
		echo '��������';
	}
}

interface Speed{
	public function showSpeed();
}

class Quick implements Speed{
	public function showSpeed(){
		echo '����';
	}
}

class Slow implements Speed{
	public function showSpeed(){
		echo '����';
	}
}

class Client{
	public static function main(){
		$car = new Jeep();
		$speed = new Quick();
		$road = new Freeway($car,$speed);
		$road->run();
	}
}

Client::main();
?>