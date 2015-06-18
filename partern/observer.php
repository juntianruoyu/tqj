<?php
/*
 * 观察者模式：定义对象间的一种一对多的依赖关系，当一个对象的状态发生改变时，所有依赖于它的对象都得到通知并被自动更新。
 * 类型：行为类模式
 *  
 * 
 */

//抽象主题角色
interface Subject
{
	public function Attach($Observer); //添加观察者
	public function Detach($Observer); //踢出观察者
	public function Notify(); //满足条件时通知观察者
	public function SubjectState($Subject); //观察条件
}

//具体主题角色
class Boss Implements Subject
{
	public $_action;
	private $_Observer;
	public function Attach($Observer)
	{
		$this->_Observer[] = $Observer;
	}
	public function Detach($Observer)
	{
		$ObserverKey = array_search($Observer, $this->_Observer);
		if($ObserverKey !== false)
		{
			unset($this->_Observer[$ObserverKey]);
		}
	}
	public function Notify()
	{
		foreach($this->_Observer as $value )
		{
			$value->Update();
		}
	}
	public function SubjectState($Subject)
	{
		$this->_action = $Subject;
	}
}

//抽象观察者角色
abstract class Observer
{
	protected $_UserName;
	protected $_Sub;
	public function __construct($Name,$Sub)
	{
		$this->_UserName = $Name;
		$this->_Sub = $Sub;
	}
	public abstract function Update(); //接收通过方法
}
//具体观察者角色
class StockObserver extends Observer
{
	public function __construct($name,$sub)
	{
		parent::__construct($name,$sub);
	}
	public function Update()
	{
		echo $this->_Sub->_action.$this->_UserName." 你赶快跑...";
	}
}
$huhansan = new Boss(); //被观察者
$gongshil = new StockObserver("三毛",$huhansan); //初始化观察者
$huhansan->Attach($gongshil); //添加一个观察者
$huhansan->Attach($gongshil); //添加一个相同的观察者
//$huhansan->Detach($gongshil); //踢出基中一个观察者
$huhansan->SubjectState("警察来了"); //达到满足的条件
$huhansan->Notify(); //通过所有有效的观察者
?>