<?php
/*
 * �����࣬���������������������new�������ɲ�������������һ�ֶ���
 */
class operator{
	public $a,$b,$oper;
	
	public function __construct($a,$b,$oper){
		$this->a = $a;
		$this->b = $b;
		$this->oper = $oper;
	}
	
	public function getresult(){
		switch ($this->oper){
			case 1: $model = new add($this->a,$this->b);break;
			case 2: $model = new jian($this->a,$this->b);break;
			case 3: $model = new cheng($this->a,$this->b);break;
			case 4: $model = new chu($this->a,$this->b);break;
			default:$model = new wrong();break;
		}
		return $model->result();
	}
}

/*
 * �����࣬���������ʵ�����㷽��
 */
abstract class poper{
	public $a,$b;
	public function __construct($a,$b){
		$this->a =$a;
		$this->b = $b;
	}
	abstract function result();
}

//���࣬�������ҵ��ʵ��
class add extends poper{
	public function result(){
		return $this->a+$this->b;
	}
}

class jian extends poper{
	public function result(){
		return $this->a-$this->b;
	}
}

class cheng extends poper{
	public function result(){
		return $this->a*$this->b;
	}
}
class chu extends poper{
	public function result(){
		if($this->b ==0){
			return '��������Ϊ0';
		}
		return $this->a/$this->b;
	}
}
?>