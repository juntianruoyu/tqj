<?php 
/**
 *   对象集合 SplObjestStorage,实现了接口：Countable , Iterator , Serializable , ArrayAccess
 *   其实就是一个数组，数组值是object，还可以给这个值关联一个 值,也就是数组值是一个 object => data 对
 *   也可以理解为一个对象集合
 *   还可以理解为一个hash表
 */
class Item{
	public $i;
	public function __construct($i){
		$this->i = $i;
	}
}
$obj1 = new Item(1);
$obj2 = new Item(2);
$obj3 = new Item(3);
$obj4 = new Item(4);
$storage = new SplObjectStorage();
$storage->attach($obj1,'a');//往集合中添加一个对象,第二个参数可选，把这个对象关联一个数据
$storage->attach($obj2);
$storage->attach($obj3);
$storage->attach($obj4);
$storage->attach($obj4);//如果集合中已经存在此对象，不再重复插入

$storage->detach($obj4);//删除元素

var_dump($storage->count());//求长度
var_dump($storage->contains($obj1));//返回bool值，集合中是否存在这个对象

//storage->getHash(obj)  5.4.0以上版本才能用，返回对象的hash id,32位，和下面这个函数的结果一样
var_dump(spl_object_hash($obj1));


$storageBak = new SplObjectStorage();
$storageBak->addAll($storage);//将一个已存在的对象集合加入另一个对象集合，相当于求并集
foreach ($storageBak as $k=>$v){
	var_dump($v);
}
//$storage->removeAll($storageBak);//相当于求差集，将存在于bak中的对象从集合中删除，集合已经改变
//$storage->removeAllExcept($storageBak);  5.3.6以后才能使用。 相当于求交集
/*
 * Iterator相关
 */
$storage->rewind();
$storage->next();
var_dump($storage->current());
var_dump($storage->key());
$storage->setInfo('b');//设置当前指针指向对象的关联数据
var_dump($storage->getInfo());//返回当前指针指向对象的关联数据
var_dump($storage->valid());



//遍历 
foreach ($storage as $k=>$v){
	var_dump($v);
}
var_dump($storage[$obj2]);//数组方式取值 

?>