<?php
 /**
 * 建造者模式
 * -------------
 * 定义：将一个复杂对象的构建与它的表示分离，使得同样的构建过程可以创建不同的表示。
 * 类型：创建类模式
 * 四个要素：
 * 1：产品类：一般是一个较为复杂的对象
 * 2：抽象建造者：提取出复杂产品类的构造。一般至少会有两个抽象方法，一个用来建造产品，一个是用来返回产品。
 * 3：建造者：实现抽象类的所有未实现的方法，具体来说一般是两项任务：组建产品；返回组建好的产品。
 * 4：导演类：负责调用适当的建造者来组建产品
 */


//复杂产品类
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

//抽象其创建过程，可用于不同对象创建
interface Bulider{
	public function createType($type);
	public function createName($name);
	public function createColor($color);
	public function createPrice($price);
	
	public function createCar();
}

class ConcreteBulider implements Bulider{//包含一个复杂对象
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

//封装易变的部分，比如顺序、属性
class Derictor{
	public function __construct(ConcreteBulider $bulider){
		$bulider->createColor('红色');
		$bulider->createName('宝马');
		$bulider->createPrice('150万');
		$bulider->createType('SUV');
	}
}

class Client{
	public static function main(){
		//创建一个建造者，导演类利用其创建对象
		$bulider = new ConcreteBulider();
		$derictor = new Derictor($bulider);
		$car = $bulider->createCar();
		$car->show();
	}
}

Client::main();
?>