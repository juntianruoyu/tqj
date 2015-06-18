<?php
/** 桥接模式：将抽象部分与实现部分分离，使它们都可以独立的变化。
 * 
 * 在软件系统中，某些类型由于自身的逻辑，它具有两个或多个维度的变化,桥接模式就是应对这种多维度的变化
 */



//例子：车在路上行驶，速度可变。三个维度：路、车、速度。2*2*2=8中情况
//抽象出路，车，速度，分别实现。其中路作为最底层，包含车和速度实例。（也可以把速度放到车里面，车放到路里面）

//很灵活的组合，比如说有的需要三个维度，那么三个全用上即可，有的不需要三个维度，那就去掉不要的维度(车快速的行驶，不需要路)
interface Road{
	public function run();
}

class Street implements Road{
	public $car;
	public $speed;
	public function __construct($car,$speed){
		$this->car = $car;
		$this->speed = $speed;
	}
	
	public function run(){
		echo $this->car->run();
		echo $this->speed->showSpeed();
		echo '行驶在普通街道上';
	}
}

class Freeway implements Road{
	public $car;
	public $speed;
	public function __construct($car,$speed){
		$this->car = $car;
		$this->speed = $speed;
	}
	
	public function run(){
		echo $this->car->run();
		echo $this->speed->showSpeed();
		echo '行驶在高速公路上';
	}
}

interface Car{
	public function run();
}

class Jeep implements Car{
	public function run(){
		echo '吉普车';
	}
}

class Bus implements Car{
	public function run(){
		echo '公共汽车';
	}
}

interface Speed{
	public function showSpeed();
}

class Quick implements Speed{
	public function showSpeed(){
		echo '快速';
	}
}

class Slow implements Speed{
	public function showSpeed(){
		echo '缓慢';
	}
}

class Client{
	public static function main(){
		$car = new Jeep();
		$speed = new Quick();
		$road = new Freeway($car,$speed);
		$road->run();
	}
}

Client::main();
?>