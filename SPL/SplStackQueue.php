<?php 
/**
 * SPL ջ�Ͷ���               SplStack  SplQueue���Ǽ̳���  SplDoublyLinkedList 
 * 
 *        SplStack  :��д�� setIteratorMode()����
 *        SplQueue  :��д�� setIteratorMode()�������Լ�����������У������з���
 */

/*
 *   ջ :���л�������ͬ˫������
 * 
 */
$stack = new SplStack();

$stack->push('a');//��ջ
$stack->push('b');
$stack->push('c');
$stack->push('d');

var_dump($stack->pop());//��ջ,����ȳ�d


/*
 *    ���У��������еĲ���ͬ˫������
 *    enquene ������൱�� SplDoublyLinkedList::push()
 *    dequene ������൱�� SplDoublyLinkedList::shift()
 */

$queue = new SplQueue();
$queue->enqueue('a');//�����
$queue->enqueue('b');
$queue->enqueue('c');
$queue->enqueue('d');
$queue->enqueue('e');

var_dump($queue->dequeue());//�Ƚ��ȳ� a


?>