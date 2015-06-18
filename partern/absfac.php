<?php
/* 抽象工厂模式：提供一个创建一系统相关或相互依赖对象的接口，而无需指定它们具体的类
 * 创建型模式
 */

//抽象小米工厂，能制造小米一，小米二
abstract class mifactory{
	abstract public function createmione();
	abstract public function createmitwo();
}
//具体工厂：生产白色的小米
class white extends mifactory{
	public function createmione(){
		return new whiteone();
	}
	public function createmitwo(){
		return new whitetwo();
	}
}
//具体工厂：生产黑色的小米
class black extends mifactory{
	public function createmione(){
		return new blackone();
	}
	public function createmitwo(){
		return new blacktwo();
	}
}
//产品接口
interface product{
	public function colorvoice();
}

//白色小米一
class whiteone implements product{
	public function colorvoice(){
		echo 'white one';
	}
}
//白色小米二
class whitetwo implements product{
	public function colorvoice(){
		echo 'white two';
	}
}
//黑色小米一
class blackone implements product{
	public function colorvoice(){
		echo 'black one';
	}
}
//黑色小米二
class blacktwo implements product{
	public function colorvoice(){
		echo 'black two';
	}
}
//现在可以随意创建产品了
$m = new black();
$n = $m->createmitwo();
$n->colorvoice();
?>