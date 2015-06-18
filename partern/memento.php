<?php
/*����¼ģʽ���ڲ��ƻ���װ��ǰ���£���ȡ������ڲ�״̬�������ڶ����Ᵽ���״̬�������Ϳ��Խ��ö���ָ�������֮ǰ��״̬����Ϊģʽ��
 * 
 * �����ˣ���¼��ǰʱ�̵��ڲ�״̬����������Щ���ڱ��ݷ�Χ��״̬�����𴴽��ͻָ�����¼���ݡ�
 * ����¼������洢�����˶�����ڲ�״̬������Ҫ��ʱ���ṩ��������Ҫ���ڲ�״̬��
 * �����ɫ���Ա���¼���й���������ṩ����¼��
 */

//�����ˣ�����������Ҫ������״̬�����������������������ָ�����
class origin{
	
	private $state;
	
	public function setstate($state){
		$this->state = $state;
	}
	
	public function show(){
		echo $this->state."<br/>";
	}
	
	public function setmemento(){//����������¼
		return new memento($this->state);
	}
	
	public function restore(memento $memento){//��ȡ����¼�д�ȡ��״̬���ָ�
		$this->state = $memento->getstate();
	}
}

class memento{//����¼���洢״̬
	private $state;
	
	public function __construct($state){
		$this->state = $state;
	}
	
	public function getstate(){
		return $this->state;
	}
}

class caretaker{//�����ˣ�������¼
	private $memento;
	
	public function getmemento(){
		return $this->memento;
	}
	
	public function setmemento($memento){
		$this->memento = $memento;
	}
}

$org = new origin();
$org->setstate('open');
$org->show();

$memento = $org->setmemento();//������Ҫ��״̬����,���ɱ���¼
//$persion = new caretaker();
//$persion->setmemento($memento);

$org->setstate('close');
$org->show();

$org->restore($memento);//�ָ�
$org->show();
?>