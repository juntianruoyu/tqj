<?php
/*迭代器模式： 提供一种方法顺序访问一个聚合对象中各个元素, 而又不需暴露该对象的内部表示。（行为模式）
 *
 1．迭代器角色（Iterator）：迭代器角色负责定义访问和遍历元素的接口。
 2．具体迭代器角色（Concrete Iterator）：具体迭代器角色要实现迭代器接口，并要记录遍历中的当前位置。
 3．集合角色（Aggregate）：集合角色负责提供创建具体迭代器角色的接口。
 4．具体集合角色（Concrete Aggregate）：具体集合角色实现创建具体迭代器角色的接口——这个具体迭代器角色于该集合的结构相关。
 */

/**
 * 迭代器接口,定义访问和遍历元素的操作
 */
interface IIterator{
	//移动到聚合对象的第一个元素位置
	public function first();
	//移动到聚合对象的下一个元素位置
	public function next();
	
	/**
	 * 判断是否已经移动到聚合对象的最后一个位置
	 * true 表示移动到了聚合对象的最后一个位置
	 * false 表示还没有移动到聚合对象的最后一个位置
	 */
	public function isDone();
	
	
	/**
	 * 取得迭代的当前元素  
	 * 返回迭代的当前元素
	 */
	public function currentItem();
}
 
/**
 * 具体的迭代器实现对象,示意的是聚合对象为数组的迭代器
 * 不同的聚合对象相应的迭代器的实现是不同的
 */
 
class ConcreteIterator implements IIterator{
	//持有被迭代的具体聚合对象
	private $aggregate;
	/**
	 * 内部索引,记录当前迭代到的索引位置
	 * -1表示刚刚开始的时候，迭代器指向聚合对象第一个对象之前
	 */
	private $index = -1;
	private $aggregateCount = null;
	/**
	 * 构造函数，传入被迭代的具体聚合对象
	 * @param $aggregate 被迭代的具体聚合对象
	 */
	public function __construct($aggregate){
		$this->aggregate = $aggregate;
		$this->aggregateCount = $this->aggregate->getCounts();
	}
	 
	public function first(){
		$this->index = 0;
	}
	 
	public function next(){
		if($this->index < $this->aggregateCount){
			$this->index = $this->index + 1;
		}
	}
	 
	public function isDone(){
		if($this->index == $this->aggregateCount){
			return true;
		}
		return false;
	}
	 
	public function currentItem(){
		return $this->aggregate->getItem($this->index);
	}
	 
	public function getAggregateCount(){
		return $this->aggregateCount;
	}
}
 
/**
 * 聚合对象的抽象类，定义了创建相应迭代器对象的接口,每一个实现该聚合对象抽象类的对象都要实现这个抽象方法
 */
abstract class Aggregate{
	public abstract function createIterator();
}
 
/**
 * 具体的聚合对象,实现创建相应迭代器对象的功能
 */
class ConcreteAggregate extends Aggregate{
	//聚合对象的具体内容
	private $arrayAgg = null;
	 
	/**
	 * 构造函数:传入聚合对象具体的内容,在这个例子中是数组
	 * @param $arrayAgg 聚合对象的具体内容
	 */
	 
	public function __construct($arrayAgg){
		$this->arrayAgg = $arrayAgg;
	}
	 
	public function createIterator(){
		//实现创建Iterator的工厂方法
		return new ConcreteIterator($this);
	}
	 
	public function getItem($index){
		if($index < sizeof($this->arrayAgg)){
			return $this->arrayAgg[$index];
		}
	}
	 
	public function getCounts(){
		return sizeof($this->arrayAgg);
	}
}
 
/**
 * 看看具体的使用方法
 */
$aggregate = new ConcreteAggregate(array('张三','李四','王五'));
$iterator = $aggregate->createIterator();
 
$iterator->first();

while(!$iterator->isDone()){
	$obj = $iterator->currentItem();
	echo "The obj == ".$obj."<br>";
	$iterator->next();
}
?>