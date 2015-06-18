<?php 
/**
 * SPL˫�����SplDoublyLinkedList(),ʵ����Iterator , ArrayAccess , Countable�ӿ�
 */


$linklist = new SplDoublyLinkedList();

$linklist->push('a');//����Ԫ��
$linklist->push('b');
$linklist->push('c');
$linklist->push('d');

var_dump($linklist->getIteratorMode());


/*
 * Iterator ϵ�з���
 */
$linklist->rewind();//ָ��ָ��ͷ���������޷���ֵ
$linklist->next();//�ƶ�ָ�룬�������޷���ֵ
var_dump($linklist->key());//���ص�ǰָ��ָ���index
var_dump($linklist->current());//���ص�ǰָ��ָ���element
var_dump($linklist->valid());//���ָ���Ƿ��Ƴ�����

//����
$linklist->prev();//ָ����ǰ�ƶ�����Ӧnext���
var_dump($linklist->current());

/*
 * ArrayAccess ϵ�з���
 */
//offSetGet offsetSet  offsetExists  offsetUnset ��SplFixedArray��һ�����������鷽ʽ�ļ�������
foreach ($linklist as $value){//������foreach����
	echo $value;
	echo PHP_EOL;
}

var_dump($linklist[0]);//�����鷽ʽȡֵ
echo count($linklist);//4,���鷽ʽ
echo PHP_EOL;


/*
 * Countable()����
 */
echo $linklist->count();//4


/*
 * �������з���
 */

$linklist->rewind();//ָ��ָ��ײ�,�������Ҫ����

//add()������5.5.0���ϵİ汾�Ŵ��ڣ���һ��ֵ��������ĳ��λ�ã���ԭ����ֵ�γ�����Ҳ��������ڵ�Ķ��ֵ���ӳ�һ������
//serialize()/unserialize()����������5.4.0���ϵİ汾�в���ʹ�ã����л��ͷ����л�ʹ��

var_dump($linklist->isEmpty());//�ж��Ƿ�Ϊ��
$linklist->push('e');//����������Ԫ��
$linklist->unshift('A');//���ײ�����Ԫ��

var_dump($linklist->top());//���ض���Ԫ��,�������ڶ���
var_dump($linklist->bottom());//���صײ�Ԫ�أ��Ȳ�����ڵײ�

var_dump($linklist->pop());//��������Ԫ��
var_dump($linklist->shift());//�����ײ�Ԫ��

$linklist->setIteratorMode(SplDoublyLinkedList::IT_MODE_DELETE);//��������һ�ԣ��ݲ����������ô�õ�
var_dump($linklist->getIteratorMode());



?>
