<?php
/*������ģʽ�� �ṩһ�ַ���˳�����һ���ۺ϶����и���Ԫ��, ���ֲ��豩¶�ö�����ڲ���ʾ������Ϊģʽ��
 *
 1����������ɫ��Iterator������������ɫ��������ʺͱ���Ԫ�صĽӿڡ�
 2�������������ɫ��Concrete Iterator���������������ɫҪʵ�ֵ������ӿڣ���Ҫ��¼�����еĵ�ǰλ�á�
 3�����Ͻ�ɫ��Aggregate�������Ͻ�ɫ�����ṩ���������������ɫ�Ľӿڡ�
 4�����弯�Ͻ�ɫ��Concrete Aggregate�������弯�Ͻ�ɫʵ�ִ��������������ɫ�Ľӿڡ�����������������ɫ�ڸü��ϵĽṹ��ء�
 */

/**
 * �������ӿ�,������ʺͱ���Ԫ�صĲ���
 */
interface IIterator{
	//�ƶ����ۺ϶���ĵ�һ��Ԫ��λ��
	public function first();
	//�ƶ����ۺ϶������һ��Ԫ��λ��
	public function next();
	
	/**
	 * �ж��Ƿ��Ѿ��ƶ����ۺ϶�������һ��λ��
	 * true ��ʾ�ƶ����˾ۺ϶�������һ��λ��
	 * false ��ʾ��û���ƶ����ۺ϶�������һ��λ��
	 */
	public function isDone();
	
	
	/**
	 * ȡ�õ����ĵ�ǰԪ��  
	 * ���ص����ĵ�ǰԪ��
	 */
	public function currentItem();
}
 
/**
 * ����ĵ�����ʵ�ֶ���,ʾ����Ǿۺ϶���Ϊ����ĵ�����
 * ��ͬ�ľۺ϶�����Ӧ�ĵ�������ʵ���ǲ�ͬ��
 */
 
class ConcreteIterator implements IIterator{
	//���б������ľ���ۺ϶���
	private $aggregate;
	/**
	 * �ڲ�����,��¼��ǰ������������λ��
	 * -1��ʾ�ոտ�ʼ��ʱ�򣬵�����ָ��ۺ϶����һ������֮ǰ
	 */
	private $index = -1;
	private $aggregateCount = null;
	/**
	 * ���캯�������뱻�����ľ���ۺ϶���
	 * @param $aggregate �������ľ���ۺ϶���
	 */
	public function __construct($aggregate){
		$this->aggregate = $aggregate;
		$this->aggregateCount = $this->aggregate->getCounts();
	}
	 
	public function first(){
		$this->index = 0;
	}
	 
	public function next(){
		if($this->index < $this->aggregateCount){
			$this->index = $this->index + 1;
		}
	}
	 
	public function isDone(){
		if($this->index == $this->aggregateCount){
			return true;
		}
		return false;
	}
	 
	public function currentItem(){
		return $this->aggregate->getItem($this->index);
	}
	 
	public function getAggregateCount(){
		return $this->aggregateCount;
	}
}
 
/**
 * �ۺ϶���ĳ����࣬�����˴�����Ӧ����������Ľӿ�,ÿһ��ʵ�ָþۺ϶��������Ķ���Ҫʵ��������󷽷�
 */
abstract class Aggregate{
	public abstract function createIterator();
}
 
/**
 * ����ľۺ϶���,ʵ�ִ�����Ӧ����������Ĺ���
 */
class ConcreteAggregate extends Aggregate{
	//�ۺ϶���ľ�������
	private $arrayAgg = null;
	 
	/**
	 * ���캯��:����ۺ϶�����������,�����������������
	 * @param $arrayAgg �ۺ϶���ľ�������
	 */
	 
	public function __construct($arrayAgg){
		$this->arrayAgg = $arrayAgg;
	}
	 
	public function createIterator(){
		//ʵ�ִ���Iterator�Ĺ�������
		return new ConcreteIterator($this);
	}
	 
	public function getItem($index){
		if($index < sizeof($this->arrayAgg)){
			return $this->arrayAgg[$index];
		}
	}
	 
	public function getCounts(){
		return sizeof($this->arrayAgg);
	}
}
 
/**
 * ���������ʹ�÷���
 */
$aggregate = new ConcreteAggregate(array('����','����','����'));
$iterator = $aggregate->createIterator();
 
$iterator->first();

while(!$iterator->isDone()){
	$obj = $iterator->currentItem();
	echo "The obj == ".$obj."<br>";
	$iterator->next();
}
?>