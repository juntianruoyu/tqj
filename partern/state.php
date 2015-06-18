<?php
/** 状态模式：允许一个对象在其内部状态改变时改变它的行为。对象看起来似乎修改了它的类。（行为模式）
 * 
 * 在很多情况下，一个对象的行为取决于一个或多个动态变化的属性，这样的属性叫做状态，
 * 这样的对象叫做有状态的(stateful)对象，这样的对象状态是从事先定义好的一系列值中取出的。
 * 当一个这样的对象与外部事件产生互动时，其内部状态就会改变，从而使得系统的行为也随之发生变化。
 * 
 * 
 * 三要素：1 抽象状态接口，所有具体状态实现此接口。
 * 2: 具体状态，有几个状态就有几个类，分别代表不同的状态
 * 3 环境类，就是具体的事物，此例中的电灯。必须包含一个状态实例
 * 
 */


/*
 * 以电灯为例：电灯对象本身有两个状态，开/关， 一个行为：按下开关。
 * 当电灯的状态为开时，按下开关，表现为关灯；当电灯的状态为关时，按下开关，表现为开灯；典型的状态改变时，改变了开关的行为
 * 
 */

//抽象状态接口
interface state{
	public function show();//展示当前状态
	public function handle($light);//当前状态改变时，设置电灯的下一个状态，操作对象电灯
}

//电灯的两个具体状态
class onstate implements state{
	public function show(){
		echo '是开灯状态';
	}
	public function handle($light){
		$light->set(new offstate());
	}
}

class offstate implements state{
	public function show(){
		echo '是关灯状态';
	}
	
	public function handle($light){
		$light->set(new onstate());
	}
}

//环境类，电灯。状态state   行为puton
class light{
	public $state;
	public function set(state $state){//设置电灯的状态
		$this->state = $state;
	}
	public function puton(){//行为
		echo '电灯初始状态:';
		$this->state->show();
		$this->state->handle($this);
		echo "<br/>";
		echo '按下开关之后:';
		$this->state->show();
	}
}

//实例化一个电灯，设置初始状态为开
$m = new light();
$m->set(new onstate());

//按下开关
$m->puton();
echo "<br/>";
echo '--------------------------------';
echo "<br/>";
$m->puton();
?>
