<?php 
/**
 * 带权队列，   SplPriorityQueue ，是一个大顶堆结构，和堆的方法一样。也实现了Iterator  Countable
 */



//按照权值大小进行的构件大顶堆


$queue = new SplPriorityQueue();


/* SplPriorityQueue::EXTR_BOTH :权值和值
 * SplPriorityQueue::EXTR_DATA :值
 * SplPriorityQueue::EXTR_PRIORITY：权值  
 */
$queue->setExtractFlags(SplPriorityQueue::EXTR_BOTH);//模式设置，设置弹出结点时，权值和值都弹出还是只显示其一


$queue->insert('a','0');//插入结点，包括值和权值，按照权值构件大顶堆结构
$queue->insert('b','4');
$queue->insert('c','5');
$queue->insert('d','1');
$queue->insert('e','3');
echo $queue->count();//长度
var_dump($queue->top());



/*
 * Iterator方法
 */
$queue->rewind();
$queue->next();
var_dump($queue->key());
var_dump($queue->current());
var_dump($queue->valid());


//其他方法参考堆
?>