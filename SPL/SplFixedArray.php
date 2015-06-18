<?php
/*
 * SplFixedArray():���ڴ����̶����ȵ����飬ֻ������������Ϊ����������ͨphp������죬���ܸ���
 * ������ʵ����Iterator  ArrayAccess  Countable�⼸���ӿ�
 * ʵ����ArrayAccess����ô����ʹ��foreach����
 * ʵ����Countable����ô����ʹ��count���㳤��
 * ʵ����Iterator����ô����������һ������
 */
$arr = new SplFixedArray(5);//����ʱָ������

$arr->setSize(4);//setSize()��̬�������鳤��
$arr[0] = 'a';
$arr[1] = 'b';
$arr[2] = 'c';
$arr[3] = 'd';

//�������������ָ��ָ��ĩβ��
foreach ($arr as $v){
	echo $v;
	echo PHP_EOL;
}
echo "<br/>";
var_dump($arr->valid());//�Ѿ��Ƴ�������

//getSize() count()���ǻ�ȡ���鳤��
$a = $arr->getSize();
echo $a;//4
echo "<br/>";

echo $arr->count();//ʵ����Countable�ӿڵķ���,4
echo "<br/>";

$a = count($arr);//����ʵ����Countable��php�����ṩ��count����Ҳ����
echo $a;//4
echo "<br/>";

//ʵ��Iterator�еķ���

/*
 *        �ƶ�ָ�뷽����          rewind()��next()����ֻ�ƶ�ָ�룬�޷���ֵ����һ������ 
 *        ȡ��ֵ�ķ�����          key(),current() ���ص�ǰָ��ָ���index ��element
 *        ���ָ�뷽����          valid() ��鵱ǰָ���Ƿ񳬳����鷶Χ,����boolֵ
 * 
 */

$arr->rewind();//����ָ�룬ָ��ͷ�����޷���ֵ
$a = $arr->current();//���ص�ǰָ��ָ���ֵ
var_dump($a);
echo PHP_EOL;
$arr->next();//�ƶ�ָ�룬��ָ��ָ����һλ���޷���ֵ
$a = $arr->valid();//��⵱ǰָ���Ƿ���Ч��Ҳ����˵��ǰָ���Ƿ񳬳����鷶Χ
var_dump($a);
$a = $arr->current();//���ص�ǰָ��ָ���ֵ
var_dump($a);
echo PHP_EOL;
echo $arr->key();//���ص�ǰָ��ָ���key
$arr->next();
$arr->next();
$arr->next();//�Ƴ������鷶Χ��
var_dump($arr->valid());//��ⷵ��false

/*======================================
 * 
 * offsetget(index) = $arr[$index]//��ȡ������Ӧ��Ԫ��ֵ
 * offserget(index,element) = ($arr[$index]=$element)//�޸�index��Ӧ��element
 * offsetUnset(index) = unset($arr[$index])//�ͷ�index��Ӧ��element
 * offsetExists(index) = isset($arr[$index])//�ж�index�Ƿ����
 * 
 *=======================================*/
$a = $arr->offsetGet(3); // �൱�� $arr[3]
var_dump($a);//d
echo $arr[3];//d
echo PHP_EOL;

$arr->offsetSet(3,'e');//�൱��$arr[3] = 'e';
echo $arr[3];
$arr[3] = 'd';
echo PHP_EOL;
echo $arr[3];

$arr->offsetUnset(3);//�൱��unset($arr[3]);
var_dump($arr[3]);//null

$m = $arr->offsetExists(3);//�൱��isset($arr[3])
var_dump($m);








/*=======SplFixedArray()��PHP�����ת������======  

       ���� fromAaary() : ��һ��PHP��ͨ����ת����SPL���飬��̬����SplFixedArray::fromArray(),
      ����       toArray() ����һ��SPL����ת����PHP��ͨ���� ,�޲���������PHP��ͨ����

=============================================*/

$arr = $arr->toArray();
var_dump($arr);//������ͨphp����

$arr = array(1=>3,0=>1,4=>2);//��ͨPHP����
$arr = SplFixedArray::fromArray($arr);//�ڶ���������Ĭ��true����ʾ����ԭ����������ϵ��false��ʾ����ԭ��������
var_dump($arr);//����SPL����

$arr = array(1=>3,0=>1,4=>2);//��ͨPHP����
$arr = SplFixedArray::fromArray($arr,false);//����ԭ����������ϵ
var_dump($arr);//����SPL����


?>


