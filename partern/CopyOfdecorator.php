<?php 
interface Ivisitor{
	public function visitElementA($element);
	public function visitElementB($element);
}

interface Element{
	public function accept($visitor);
}

class Visitor implements Ivisitor{
	public function visitElementA($element){
		$element->say();
	}
	public function visitElementB($element){
		$element->say();
	}
}

class ElementA implements Element{
	public function say(){
		echo 'I am ElementA';
	}
	public function accept($visitor){
		$visitor->visitElementA($this);
	}
}

class ElementB implements Element{
	public function say(){
		echo 'I am ElementB';
	}
	public function accept($visitor){
		$visitor->visitElementB($this);
	}
}

class DataSturcter{
	public $data = array();
	public function add($data){
		$this->data[] = $data;
	}
	
	public function show($visitor){
		foreach ($this->data as $element){
			$element->accept($visitor);
		}
	}
}

$a = new Visitor();
$data1 = new ElementA();
$data2 = new ElementB();

$datas = new DataSturcter();
$datas->add($data1);
$datas->add($data2);

$datas->show($a);

?>