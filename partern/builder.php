<?php
 /**
 * ������ģʽ
 * -------------
 * ���壺��һ�����Ӷ���Ĺ��������ı�ʾ���룬ʹ��ͬ���Ĺ������̿��Դ�����ͬ�ı�ʾ��
 * ���ͣ�������ģʽ
 * �ĸ�Ҫ�أ�
 * 1����Ʒ�ࣺһ����һ����Ϊ���ӵĶ���
 * 2���������ߣ���ȡ�����Ӳ�Ʒ��Ĺ��졣һ�����ٻ����������󷽷���һ�����������Ʒ��һ�����������ز�Ʒ��
 * 3�������ߣ�ʵ�ֳ����������δʵ�ֵķ�����������˵һ�������������齨��Ʒ�������齨�õĲ�Ʒ��
 * 4�������ࣺ��������ʵ��Ľ��������齨��Ʒ
 */


//���Ӳ�Ʒ��
class Car{
	private $name;
	private $type;
	private $price;
	private $color;
	
	public function setName($name){
		$this->name = $name;
	}
	
	public function setType($type){
		$this->type = $type;
	}
	
	public function setPrice($price){
		$this->price = $price;
	}
	public function setColor($color){
		$this->color = $color;
	}
	
	public function show(){
		echo $this->name.': '.$this->type.'  '.$this->color.'  '.$this->price;
		echo "<br/>";
	}
}

//�����䴴�����̣������ڲ�ͬ���󴴽�
interface Bulider{
	public function createType($type);
	public function createName($name);
	public function createColor($color);
	public function createPrice($price);
	
	public function createCar();
}

class ConcreteBulider implements Bulider{//����һ�����Ӷ���
	public $car;
	
	public function __construct(){
		$this->car = new Car();
	}
	public function createType($type){
		$this->car->setType($type);
	}
	
	public function createColor($color){
		$this->car->setColor($color);
	}
	
	public function createName($name){
		$this->car->setName($name);
	}
	
	public function createPrice($price){
		$this->car->setPrice($price);
	}
	
	public function createCar(){
		return $this->car;
	}
}

//��װ�ױ�Ĳ��֣�����˳������
class Derictor{
	public function __construct(ConcreteBulider $bulider){
		$bulider->createColor('��ɫ');
		$bulider->createName('����');
		$bulider->createPrice('150��');
		$bulider->createType('SUV');
	}
}

class Client{
	public static function main(){
		//����һ�������ߣ������������䴴������
		$bulider = new ConcreteBulider();
		$derictor = new Derictor($bulider);
		$car = $bulider->createCar();
		$car->show();
	}
}

Client::main();
?>