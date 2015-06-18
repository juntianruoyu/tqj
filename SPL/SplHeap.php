<?php 
/**
 * SplHeap 是一个抽象类，定义了一些堆中常用的方法,实现了接口 ：Iterator , Countable，定义了唯一的抽象方法 compare用于内部比较protected
 *
 * 大顶堆和小顶堆都实现了 SplHeap这个抽象类
 */

/*
 * 大顶堆 SplMaxHeap
 */

$heap = new SplMaxHeap();
$heap->insert(0);//插入节点的时候，就已经排好了序
$heap->insert(5);
$heap->insert(4);
$heap->insert(1);
$heap->insert(3);


//已经构建了大顶堆
/*
 * 堆拥有的函数
 */


var_dump($heap->isEmpty());//堆是否为空
var_dump($heap->count());//实现了countable接口，堆结点个数
var_dump($heap->top());//返回堆顶元素

var_dump($heap->extract());//提取堆顶元素,并且进行重构

foreach ($heap as $v){
	echo $v;
	echo PHP_EOL;
}




$heap->recoverFromCorruption();//堆清空



/*
 * Iterator 方法
 */
$heap->rewind();//指针指向堆顶

var_dump($heap->key());//当前指针指向的index
var_dump($heap->current());//当前指针指向的element

$heap->next();//移动指针，指向下一位
var_dump($heap->valid());//判断指针是否在大顶堆的范围





?>