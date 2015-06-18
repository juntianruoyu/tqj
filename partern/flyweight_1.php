<?php
//һ����Ʒ��ISBN�ź�����
class Product{
	public $ISBN;
	public $name;
}

//��Ԫ�࣬��ȡ�����ԣ�ͬһ��ISBN�Ŷ�Ӧ�����ֲ���䣬���Ȿ��������ȡ������������Ԫ����������Ԫ����ʹ洢������״̬������״̬��ISBN����

class Book{
	public $name;
	public function __construct($name){
		$this->name = $name;
	}
	public function show(){
		echo $this->name;
	}
	
}


//��Ԫ���������������������̶��󣬷��ض�Ӧ����Ԫ����
class BookFactory{
	public $books = array();
	public function getBook($ISBN,$name){//ά��һ�������
		if(!isset($this->books[$ISBN])){
			$this->books[$ISBN] = new Book($name);
		}
		return $this->books[$ISBN];
	}
}

$obj = new BookFactory();
$book = $obj->getBook('1111','PHP�߼��������');
$book2 = $obj->getBook('1111','');
$book2->show();
?>