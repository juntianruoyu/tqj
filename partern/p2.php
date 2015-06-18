<?php
/*
 * 工厂类，里面包含工厂方法，代替new操作，由参数决定创建哪一种对象
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
 * 抽象类，其子类必须实现运算方法
 */
abstract class poper{
	public $a,$b;
	public function __construct($a,$b){
		$this->a =$a;
		$this->b = $b;
	}
	abstract function result();
}

//子类，负责具体业务实现
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
			return '除数不能为0';
		}
		return $this->a/$this->b;
	}
}
?>