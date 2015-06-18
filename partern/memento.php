<?php
/*备忘录模式：在不破坏封装的前提下，获取对象的内部状态，并且在对象外保存该状态。这样就可以将该对象恢复到保存之前的状态（行为模式）
 * 
 * 发起人：记录当前时刻的内部状态，负责定义哪些属于备份范围的状态，负责创建和恢复备忘录数据。
 * 备忘录：负责存储发起人对象的内部状态，在需要的时候提供发起人需要的内部状态。
 * 管理角色：对备忘录进行管理，保存和提供备忘录。
 */

//发起人，它有需求需要将自身状态保存起来，自身包含备忘与恢复操作
class origin{
	
	private $state;
	
	public function setstate($state){
		$this->state = $state;
	}
	
	public function show(){
		echo $this->state."<br/>";
	}
	
	public function setmemento(){//保存至备忘录
		return new memento($this->state);
	}
	
	public function restore(memento $memento){//获取备忘录中存取的状态，恢复
		$this->state = $memento->getstate();
	}
}

class memento{//备忘录，存储状态
	private $state;
	
	public function __construct($state){
		$this->state = $state;
	}
	
	public function getstate(){
		return $this->state;
	}
}

class caretaker{//管理人，管理备忘录
	private $memento;
	
	public function getmemento(){
		return $this->memento;
	}
	
	public function setmemento($memento){
		$this->memento = $memento;
	}
}

$org = new origin();
$org->setstate('open');
$org->show();

$memento = $org->setmemento();//发起人要将状态保存,生成备忘录
//$persion = new caretaker();
//$persion->setmemento($memento);

$org->setstate('close');
$org->show();

$org->restore($memento);//恢复
$org->show();
?>