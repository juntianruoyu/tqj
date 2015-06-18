<?php 
/**
 *   ���󼯺� SplObjestStorage,ʵ���˽ӿڣ�Countable , Iterator , Serializable , ArrayAccess
 *   ��ʵ����һ�����飬����ֵ��object�������Ը����ֵ����һ�� ֵ,Ҳ��������ֵ��һ�� object => data ��
 *   Ҳ�������Ϊһ�����󼯺�
 *   ���������Ϊһ��hash��
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
$storage->attach($obj1,'a');//�����������һ������,�ڶ���������ѡ��������������һ������
$storage->attach($obj2);
$storage->attach($obj3);
$storage->attach($obj4);
$storage->attach($obj4);//����������Ѿ����ڴ˶��󣬲����ظ�����

$storage->detach($obj4);//ɾ��Ԫ��

var_dump($storage->count());//�󳤶�
var_dump($storage->contains($obj1));//����boolֵ���������Ƿ�����������

//storage->getHash(obj)  5.4.0���ϰ汾�����ã����ض����hash id,32λ����������������Ľ��һ��
var_dump(spl_object_hash($obj1));


$storageBak = new SplObjectStorage();
$storageBak->addAll($storage);//��һ���Ѵ��ڵĶ��󼯺ϼ�����һ�����󼯺ϣ��൱���󲢼�
foreach ($storageBak as $k=>$v){
	var_dump($v);
}
//$storage->removeAll($storageBak);//�൱��������������bak�еĶ���Ӽ�����ɾ���������Ѿ��ı�
//$storage->removeAllExcept($storageBak);  5.3.6�Ժ����ʹ�á� �൱���󽻼�
/*
 * Iterator���
 */
$storage->rewind();
$storage->next();
var_dump($storage->current());
var_dump($storage->key());
$storage->setInfo('b');//���õ�ǰָ��ָ�����Ĺ�������
var_dump($storage->getInfo());//���ص�ǰָ��ָ�����Ĺ�������
var_dump($storage->valid());



//���� 
foreach ($storage as $k=>$v){
	var_dump($v);
}
var_dump($storage[$obj2]);//���鷽ʽȡֵ 

?>