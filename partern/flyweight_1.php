<?php
//一个产品有ISBN号和名字
class Product{
	public $ISBN;
	public $name;
}

//享元类，提取出共性，同一个ISBN号对应的名字不会变，把这本书名字提取出来，放入享元对象，这样享元对象就存储了内蕴状态，外蕴状态是ISBN号码

class Book{
	public $name;
	public function __construct($name){
		$this->name = $name;
	}
	public function show(){
		echo $this->name;
	}
	
}


//享元对象生产工厂，传入外蕴对象，返回对应的享元对象。
class BookFactory{
	public $books = array();
	public function getBook($ISBN,$name){//维护一个对象池
		if(!isset($this->books[$ISBN])){
			$this->books[$ISBN] = new Book($name);
		}
		return $this->books[$ISBN];
	}
}

$obj = new BookFactory();
$book = $obj->getBook('1111','PHP高级程序设计');
$book2 = $obj->getBook('1111','');
$book2->show();
?>