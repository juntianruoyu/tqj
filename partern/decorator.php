<?php 
/**
 * װ��ģʽ���ڲ��ظı�ԭ���ļ���ʹ�ü̳е�����£���̬����չһ������Ĺ��ܡ�����ͨ������һ����װ����Ҳ����װ����������ʵ�Ķ���
 * 
 * ��ɫ
 * ���󹹼�(Component)��ɫ������һ������ӿڣ��Թ淶׼�����ո���ְ��Ķ��󣬴Ӷ����Ը���Щ����̬�����ְ��
 * ���幹��(Concrete Component)��ɫ������һ����Ҫ���ո���ְ����ࡣ 
 * װ��(Decorator)��ɫ������һ��ָ��Component�����ָ�룬������һ����Component�ӿ�һ�µĽӿڡ�
 * ����װ��(Concrete Decorator)��ɫ������������������Ӹ��ӵ�ְ��
 */

//1���󹹼���ɫ
abstract class Drink{
	abstract function showPrice();
}


//���幹����ɫ
class Coffee extends Drink{
	public $name = '����';
	public $price = '10';
	public function showPrice(){
		echo $this->name.'   ';
		echo $this->price.'Ԫ';
	}
}

//���ɶ���
$coffee = new coffee();
//$coffee->showprice();





//�������Ѿ�������һ�����������Ѿ�����������
//�������붯̬��Ϊcoffee������ӹ��ܣ������ı�ԭ�е���ͼ̳й�ϵ����ô�죿
//װ��ģʽ





//װ�ν�ɫ
class Decorator extends drink{
	public $drink;
	public function __construct(drink $drink){//��װ�˶���Ŷ
		$this->drink = $drink;
	}
	
	public function showprice(){//ʵ�ֶ���ԭ�й��ܣ�
		$this->drink->showprice();
		$this->add();//��������
	}
	public function add(){
		
	}
}

//����װ�ν�ɫ
class suger extends Decorator{
	public $price = 1.5;
	public $name = '����';
	public function add(){
		echo $this->name.'   '.$this->price;
		echo '  һ��'.($this->drink->price+$this->price).'Ԫ';
	}
}

$suger = new suger($coffee);
$suger->showprice();
?>