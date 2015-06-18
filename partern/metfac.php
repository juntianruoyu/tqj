<?php 

/* 
 * 
 * 工厂方法模式,创建型模式
        定义一个用于创建对象的工厂接口，让子类决定实例化哪一个类。Factory Method使一个类的实例化延迟到其子类
 * 
 * 四个角色：
 * 工厂接口。工厂接口是工厂方法模式的核心，与调用者直接交互用来提供产品。在实际编程中，有时候也会使用一个抽象类来作为与调用者交互的接口，其本质上是一样的。
工厂实现。在编程中，工厂实现决定如何实例化产品，是实现扩展的途径，需要有多少种产品，就需要有多少个具体的工厂实现。
产品接口。产品接口的主要目的是定义产品的规范，所有的产品实现都必须遵循产品接口定义的规范。产品接口是调用者最为关心的，产品接口定义的优劣直接决定了调用者代码的稳定性。同样，产品接口也可以用抽象类来代替，但要注意最好不要违反里氏替换原则。
产品实现。实现产品接口的具体类，决定了产品在客户端中的具体行为。
 */

interface part{
	public function work();
}

class hr implements part{
	public function work(){
		echo 'application';
	}
}
class programer implements part{
	public function work(){
		echo 'create a web';
	}
}

interface workerFactory{
	public function createobj();
}

class createhr implements workerFactory{
	public function createobj(){
		return new hr();
	}
}
class createprogramer implements workerFactory{
	public function createobj(){
		return new programer();
	}
}

$hr = new createhr();
$m = $hr->createobj();
$m->work();
?>