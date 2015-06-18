<?php 
/**
 * SPL 栈和队列               SplStack  SplQueue都是继承自  SplDoublyLinkedList 
 * 
 *        SplStack  :重写了 setIteratorMode()方法
 *        SplQueue  :重写了 setIteratorMode()方法，自己定义了入队列，出队列方法
 */

/*
 *   栈 :所有基本操作同双向链表
 * 
 */
$stack = new SplStack();

$stack->push('a');//入栈
$stack->push('b');
$stack->push('c');
$stack->push('d');

var_dump($stack->pop());//出栈,后进先出d


/*
 *    队列：基本所有的操作同双向链表，
 *    enquene 入队列相当于 SplDoublyLinkedList::push()
 *    dequene 入队列相当于 SplDoublyLinkedList::shift()
 */

$queue = new SplQueue();
$queue->enqueue('a');//入队列
$queue->enqueue('b');
$queue->enqueue('c');
$queue->enqueue('d');
$queue->enqueue('e');

var_dump($queue->dequeue());//先进先出 a


?>