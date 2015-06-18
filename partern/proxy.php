<?php 
/*
 * 代理模式
 * 为其他对象提供一种代理以控制对这个对象的访问。
 * 在某些情况下，一个对象不适合或者不能直接引用另一个对象，而代理对象可以在客户端和目标对象之间起到中介的作用。
 * 王婆就是西门庆跟潘金莲的代理。西门庆是客户端，潘金莲是对象本身。
 */

interface women{
	public function ml();
	public function say();
}

class pjl implements women{
	public function say(){
		echo 'I am panjinlian,i want to  ml with man';
	}
	public function ml(){
		echo 'hehe';
	}
}

class wangpo implements women{
	public $a;
	public function __construct(){
		$this->a = new pjl();
	}
	
	public function say(){
		$this->a->say();
	}
	public function ml(){
		$this->a->ml();
	}
}

$m = new wangpo();
$m->say();
echo "<br/>";
$m->ml();
?>