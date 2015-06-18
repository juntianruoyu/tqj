<?php
/**
 * 适配器模式：将一个类的接口转换成客户希望的另外一个接口。Adapter模式使得原来由于接口不兼容而不能一起工作的那些类可以一起工作（结构型模式）
 * 
 * 一个源接口，不符合客户的需求
 * 一个目标接口，客户需要的接口
 * 适配器类，实现客户的接口，包装了源接口
 */

//源接口
interface China{
	public function flat(); 
}

class Chinese implements China{
	public function flat(){
		echo '我用扁形孔充电';
	}
}

//$xiaoming = new Chinese();
//$xiaoming->flat();

//以上是已经存在的对象小明，他在中国用扁形孔来充电
//现在他到了欧洲，欧洲充电是圆形孔


//目标接口
interface Europe{
	public function round();
}

//适配器，包含源接口，实现（继承）目标接口
class European implements Europe{
	public $xiaoming;
	public function __construct($chinese){
		$this->xiaoming = $chinese;
	}
	
	public function round(){
		echo '在欧洲，利用电源适配器，';
		$this->xiaoming->flat();
	}
}

class Client{
	public static function main(){
		$chinese = new Chinese();
		$european = new European($chinese);
		$european->round();
		
	}
}
Client::main();
?>