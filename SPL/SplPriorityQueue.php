<?php 
/**
 * ��Ȩ���У�   SplPriorityQueue ����һ���󶥶ѽṹ���Ͷѵķ���һ����Ҳʵ����Iterator  Countable
 */



//����Ȩֵ��С���еĹ����󶥶�


$queue = new SplPriorityQueue();


/* SplPriorityQueue::EXTR_BOTH :Ȩֵ��ֵ
 * SplPriorityQueue::EXTR_DATA :ֵ
 * SplPriorityQueue::EXTR_PRIORITY��Ȩֵ  
 */
$queue->setExtractFlags(SplPriorityQueue::EXTR_BOTH);//ģʽ���ã����õ������ʱ��Ȩֵ��ֵ����������ֻ��ʾ��һ


$queue->insert('a','0');//�����㣬����ֵ��Ȩֵ������Ȩֵ�����󶥶ѽṹ
$queue->insert('b','4');
$queue->insert('c','5');
$queue->insert('d','1');
$queue->insert('e','3');
echo $queue->count();//����
var_dump($queue->top());



/*
 * Iterator����
 */
$queue->rewind();
$queue->next();
var_dump($queue->key());
var_dump($queue->current());
var_dump($queue->valid());


//���������ο���
?>