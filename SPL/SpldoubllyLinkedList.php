<?php 
/**
 * SPL双向队列SplDoublyLinkedList(),实现了Iterator , ArrayAccess , Countable接口
 */


$linklist = new SplDoublyLinkedList();

$linklist->push('a');//插入元素
$linklist->push('b');
$linklist->push('c');
$linklist->push('d');

var_dump($linklist->getIteratorMode());


/*
 * Iterator 系列方法
 */
$linklist->rewind();//指针指向开头，动作，无返回值
$linklist->next();//移动指针，动作，无返回值
var_dump($linklist->key());//返回当前指针指向的index
var_dump($linklist->current());//返回当前指针指向的element
var_dump($linklist->valid());//检测指针是否移出链表

//补充
$linklist->prev();//指针向前移动，对应next向后
var_dump($linklist->current());

/*
 * ArrayAccess 系列方法
 */
//offSetGet offsetSet  offsetExists  offsetUnset 和SplFixedArray的一样，按照数组方式的几个操作
foreach ($linklist as $value){//可以像foreach遍历
	echo $value;
	echo PHP_EOL;
}

var_dump($linklist[0]);//以数组方式取值
echo count($linklist);//4,数组方式
echo PHP_EOL;


/*
 * Countable()方法
 */
echo $linklist->count();//4


/*
 * 自身特有方法
 */

$linklist->rewind();//指针指向底部,这个函数要常用

//add()方法在5.5.0以上的版本才存在，将一个值插入链表某个位置，和原来的值形成链表，也就是这个节点的多个值链接成一个链表
//serialize()/unserialize()两个函数在5.4.0以上的版本中才能使用，序列化和反序列化使用

var_dump($linklist->isEmpty());//判断是否为空
$linklist->push('e');//往顶部插入元素
$linklist->unshift('A');//往底部插入元素

var_dump($linklist->top());//返回顶部元素,后插入的在顶部
var_dump($linklist->bottom());//返回底部元素，先插入的在底部

var_dump($linklist->pop());//弹出顶部元素
var_dump($linklist->shift());//弹出底部元素

$linklist->setIteratorMode(SplDoublyLinkedList::IT_MODE_DELETE);//这两个是一对，暂不清楚具体怎么用的
var_dump($linklist->getIteratorMode());



?>
