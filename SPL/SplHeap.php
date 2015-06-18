<?php 
/**
 * SplHeap ��һ�������࣬������һЩ���г��õķ���,ʵ���˽ӿ� ��Iterator , Countable��������Ψһ�ĳ��󷽷� compare�����ڲ��Ƚ�protected
 *
 * �󶥶Ѻ�С���Ѷ�ʵ���� SplHeap���������
 */

/*
 * �󶥶� SplMaxHeap
 */

$heap = new SplMaxHeap();
$heap->insert(0);//����ڵ��ʱ�򣬾��Ѿ��ź�����
$heap->insert(5);
$heap->insert(4);
$heap->insert(1);
$heap->insert(3);


//�Ѿ������˴󶥶�
/*
 * ��ӵ�еĺ���
 */


var_dump($heap->isEmpty());//���Ƿ�Ϊ��
var_dump($heap->count());//ʵ����countable�ӿڣ��ѽ�����
var_dump($heap->top());//���ضѶ�Ԫ��

var_dump($heap->extract());//��ȡ�Ѷ�Ԫ��,���ҽ����ع�

foreach ($heap as $v){
	echo $v;
	echo PHP_EOL;
}




$heap->recoverFromCorruption();//�����



/*
 * Iterator ����
 */
$heap->rewind();//ָ��ָ��Ѷ�

var_dump($heap->key());//��ǰָ��ָ���index
var_dump($heap->current());//��ǰָ��ָ���element

$heap->next();//�ƶ�ָ�룬ָ����һλ
var_dump($heap->valid());//�ж�ָ���Ƿ��ڴ󶥶ѵķ�Χ





?>